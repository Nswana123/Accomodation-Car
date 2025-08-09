<?php

namespace App\Http\Controllers;

use App\Models\AccommodationProvider;
use App\Models\Amenity;
use App\Models\ProviderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccommodationProviderController extends Controller
{
    public function index()
    {
        // eager load amenities and images
        $providers = AccommodationProvider::with(['amenities', 'images'])->get();
        $user = auth()->user();
        $permissions = $user->user_group->permissions;

        return view('providers.index', compact('providers', 'permissions'));
    }

    public function create()
    {
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
        $amenities = Amenity::all();

        return view('providers.create', compact('permissions', 'amenities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:Hotel,Apartment,Boarding House,Car Hire',
            'location' => 'nullable',
            'description' => 'nullable',
            'amenities' => 'array',
            'amenities.*' => 'exists:amenities,id',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $provider = AccommodationProvider::create($request->only(['name', 'type', 'location', 'description']));

        if ($request->has('amenities')) {
            $provider->amenities()->attach($request->amenities);
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('provider_images', 'public');
                $provider->images()->create(['image' => $path]);
            }
        }

        return redirect()->route('providers.index')->with('success', 'Accommodation Provider added successfully.');
    }

    public function edit($id)
    {
        $provider = AccommodationProvider::with('images')->findOrFail($id);
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
        $amenities = Amenity::all();
        $selectedAmenities = $provider->amenities->pluck('id')->toArray();

        return view('providers.edit', compact('provider', 'permissions', 'amenities', 'selectedAmenities'));
    }

    public function update(Request $request, $id)
    {
        $provider = AccommodationProvider::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'type' => 'required|in:Hotel,Apartment,Boarding House,Car Hire',
            'location' => 'nullable',
            'description' => 'nullable',
            'amenities' => 'array',
            'amenities.*' => 'exists:amenities,id',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $provider->update($request->only(['name', 'type', 'location', 'description']));

        // Sync amenities
        $provider->amenities()->sync($request->amenities ?? []);

        // Handle new images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('provider_images', 'public');
                $provider->images()->create(['image' => $path]);
            }
        }

        return redirect()->route('providers.index')->with('success', 'Accommodation Provider updated successfully.');
    }

    public function destroy($id)
    {
        $provider = AccommodationProvider::findOrFail($id);

        // Delete images from storage
        foreach ($provider->images as $image) {
            if (Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }
            $image->delete();
        }

        // Detach amenities and delete provider
        $provider->amenities()->detach();
        $provider->delete();

        return redirect()->route('providers.index')->with('success', 'Accommodation Provider deleted successfully.');
    }

    public function destroyImage($id)
{
    $image = ProviderImage::findOrFail($id);

    if (Storage::disk('public')->exists($image->image)) {
        Storage::disk('public')->delete($image->image);
    }

    $image->delete();

    return back()->with('success', 'Image deleted successfully.');
}
}
