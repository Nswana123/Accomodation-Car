<?php

namespace App\Http\Controllers;
use App\Models\UnitSuite;
use App\Models\Unit;
use App\Models\AccommodationProvider;
use Illuminate\Http\Request;

class UnitSuiteController extends Controller
{
    public function index()
    {
        $suites = UnitSuite::with('provider', 'units')->latest()->get();
           $user = auth()->user();
    $permissions = $user->user_group->permissions;
        return view('unit_suites.index', compact('suites','permissions'));
    }

    public function create()
    {
        $providers = AccommodationProvider::all();
        $units = Unit::all();
           $user = auth()->user();
    $permissions = $user->user_group->permissions;
        return view('unit_suites.create', compact('providers', 'units','permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'provider_id' => 'required|exists:accommodation_providers,id',
            'total_price_per_day' => 'required|numeric',
            'unit_ids' => 'required|array',
        ]);

      // Store
$unit_suite = UnitSuite::create($request->only('name', 'provider_id', 'total_price_per_day', 'description'));
$unit_suite->units()->sync($request->input('unit_ids', []));


        return redirect()->route('unit_suites.index')->with('success', 'Unit suite created successfully.');
    }

    public function edit(UnitSuite $unit_suite)
    {
        $providers = AccommodationProvider::all();
        $units = Unit::all();
        $selected_units = $unit_suite->units->pluck('id')->toArray();
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('unit_suites.edit', compact('unit_suite', 'providers', 'units', 'selected_units','permissions'));
    }

    public function update(Request $request, UnitSuite $unit_suite)
    {
        $request->validate([
            'name' => 'required',
            'provider_id' => 'required|exists:accommodation_providers,id',
            'total_price_per_day' => 'required|numeric',
            'unit_ids' => 'required|array',
        ]);

$unit_suite->update($request->only('name', 'provider_id', 'total_price_per_day', 'description'));
$unit_suite->units()->sync($request->input('unit_ids', []));

        return redirect()->route('unit_suites.index')->with('success', 'Unit suite updated successfully.');
    }

    public function destroy(UnitSuite $unit_suite)
    {
        $unit_suite->delete();
        return redirect()->route('unit_suites.index')->with('success', 'Unit suite deleted successfully.');
    }
}
