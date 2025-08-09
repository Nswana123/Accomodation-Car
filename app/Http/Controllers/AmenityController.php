<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::all();
         $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('amenities.index', compact('amenities', 'permissions'));
    }

    public function create()
    {
         $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('amenities.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:amenities,name',
        ]);

        Amenity::create($request->all());

        return redirect()->route('amenities.index')->with('success', 'Amenity added successfully.');
    }

    public function edit($id)
    {
        $amenity = Amenity::findOrFail($id);
         $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('amenities.edit', compact('amenity','permissions'));
    }

    public function update(Request $request, $id)
    {
        $amenity = Amenity::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:amenities,name,' . $id,
        ]);

        $amenity->update($request->all());

        return redirect()->route('amenities.index')->with('success', 'Amenity updated successfully.');
    }

    public function destroy($id)
    {
        $amenity = Amenity::findOrFail($id);
        $amenity->delete();

        return redirect()->route('amenities.index')->with('success', 'Amenity deleted successfully.');
    }
}
