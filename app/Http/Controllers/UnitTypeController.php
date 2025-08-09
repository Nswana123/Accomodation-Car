<?php
// Controller: UnitTypeController.php

namespace App\Http\Controllers;

use App\Models\UnitType;
use App\Models\Amenity;
use App\Models\UnitTypeImage;
use App\Models\AccommodationProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UnitTypeController extends Controller
{
    public function index()
    {
        $unitTypes = UnitType::with(['provider', 'images', 'amenities'])->get();
         $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('unit_types.index', compact('unitTypes','permissions'));
    }

    public function create()
    {
        $amenities = Amenity::all();
           $providers = AccommodationProvider::all();
         $user = auth()->user();
        $permissions = $user->user_group->permissions;

        return view('unit_types.create', compact('amenities','permissions','providers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'provider_id' => 'required|exists:accommodation_providers,id',
            'description' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'amenities' => 'array',
            'amenities.*' => 'exists:amenities,id',
        ]);

        $unitType = UnitType::create($request->only('name', 'provider_id', 'description'));

        if ($request->has('amenities')) {
            $unitType->amenities()->attach($request->amenities);
        }

       if ($request->hasFile('images')) {
    foreach ($request->file('images') as $image) {
        $imagePath = $image->store('unit_type_images', 'public');

        $unitType->images()->create([
            'image' => $imagePath
        ]);
    }
}


        return redirect()->route('unit_types.index')->with('success', 'Unit Type created successfully.');
    }

    public function edit($id)
    {
        $unitType = UnitType::with(['images', 'amenities'])->findOrFail($id);
        $amenities = Amenity::all();
        $providers = AccommodationProvider::all();
        $selectedAmenities = $unitType->amenities->pluck('id')->toArray();
         $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('unit_types.edit', compact('providers','unitType', 'amenities', 'selectedAmenities','permissions'));
    }

    public function update(Request $request, $id)
    {
        $unitType = UnitType::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
             'provider_id' => 'required|exists:accommodation_providers,id',
            'description' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'amenities' => 'array',
            'amenities.*' => 'exists:amenities,id',
        ]);

        $unitType->update($request->only('name', 'provider_id', 'description'));
        $unitType->amenities()->sync($request->amenities ?? []);
if ($request->hasFile('images')) {
    foreach ($request->file('images') as $image) {
        $imagePath = $image->store('unit_type_images', 'public');

        $unitType->images()->create([
            'image' => $imagePath
        ]);
    }
}


        return redirect()->route('unit_types.index')->with('success', 'Unit Type updated successfully.');
    }

    public function destroy($id)
    {
        $unitType = UnitType::findOrFail($id);
        foreach ($unitType->images as $image) {
            Storage::delete($image->image_path);
            $image->delete();
        }
        $unitType->delete();
        return redirect()->route('unit_types.index')->with('success', 'Unit Type deleted successfully.');
    }

        public function destroyImage($id)
    {
        $image = UnitTypeImage::findOrFail($id);

        // Delete the physical file
        if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        // Delete the database record
        $image->delete();

        return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
    }

}