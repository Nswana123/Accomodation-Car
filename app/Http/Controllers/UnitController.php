<?php
namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\AccommodationProvider;
use App\Models\UnitImage;
use App\Models\UnitType;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::with([ 'unitType', 'images','amenities'])->latest()->get();
          $user = auth()->user();
    $permissions = $user->user_group->permissions;
        return view('units.index', compact('units','permissions'));
    }

    public function create()
    {
        $providers = AccommodationProvider::all();
        $unitTypes = UnitType::all();
        $amenities = Amenity::all();
          $user = auth()->user();
    $permissions = $user->user_group->permissions;
        return view('units.create', compact('providers','permissions','unitTypes','amenities'));
    }

 public function store(Request $request)
{
      $validated = $request->validate([
        'name' => 'required',
        'unit_type_id' => 'required|exists:unit_types,id',
        'capacity' => 'required|integer',
        'price_per_day' => 'required|numeric',
        'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        'image_titles.*' => 'nullable|string',
         'amenities' => 'array',
            'amenities.*' => 'exists:amenities,id',
    ]);

    $unit = Unit::create($request->only([
        'name', 'unit_type_id', 'capacity', 'price_per_day', 'description'
    ]));
       if ($request->has('amenities')) {
            $unitType->amenities()->attach($request->amenities);
        }

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $index => $file) {
            $path = $file->store('units', 'public');
            UnitImage::create([
                'unit_id' => $unit->id,
                'title' => $request->image_titles[$index] ?? null,
                'image_path' => $path
            ]);
        }
    }

    return redirect()->route('units.index')->with('success', 'Unit added successfully!');
}


    public function edit(Unit $unit)
    {
        $providers = AccommodationProvider::all();
        $unitTypes = UnitType::all();
        $amenities = Amenity::all();
        $unit->load('images');
          $user = auth()->user();
    $permissions = $user->user_group->permissions;
        return view('units.edit', compact('unit', 'providers','permissions','unitTypes','amenities'));
    }

    public function update(Request $request, Unit $unit)
    {
         $validated = $request->validate([
            'unit_type_id' => 'required|exists:unit_types,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_day' => 'required|numeric|min:0',
            'images.*.file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*.title' => 'nullable|string|max:255',
              'amenities' => 'array',
            'amenities.*' => 'exists:amenities,id',
        ]);

        $unit->update([
            'unit_type_id' => $request->unit_type_id,
            'name' => $request->name,
            'description' => $request->description,
            'price_per_day' => $request->price_per_day,
        ]);
        if ($request->has('amenities')) {
            $unit->amenities()->sync($validated['amenities']);
        } else {
            $unit->amenities()->detach(); // Remove all if none selected
        }
        if ($request->has('images')) {
            foreach ($request->images as $image) {
                if (isset($image['file'])) {
                    $path = $image['file']->store('units', 'public');
                    UnitImage::create([
                        'unit_id' => $unit->id,
                        'image_path' => $path,
                        'title' => $image['title'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('units.index')->with('success', 'Unit updated successfully.');
    }

   
    public function destroy(Unit $unit)
    {
        foreach ($unit->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $unit->delete();

        return redirect()->route('units.index')->with('success', 'Unit deleted successfully.');
    }
     public function deleteImage($id)
    {
        $image = UnitImage::findOrFail($id);
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Image deleted.');
    }
}
