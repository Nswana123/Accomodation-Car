<?php

namespace App\Http\Controllers;
use App\Models\AccommodationProvider;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
   public function index(Request $request)
{
   $query = AccommodationProvider::with(['images', 'unitType.units','amenities'])
        ->whereIn('type', ['Hotel', 'Apartment', 'Lodge', 'Boarding House']);

  if ($request->filled('search')) {
    $query->where(function ($q) use ($request) {
        $search = '%' . $request->search . '%';
        $q->where('name', 'like', $search)
          ->orWhere('location', 'like', $search)
          ->orWhereHas('amenities', function ($q2) use ($search) {
              $q2->where('name', 'like', $search);
          });
    });
}

    if ($request->location && $request->location !== 'All Locations') {
        $query->where('location', $request->location);
    }

    $providers = $query->get()->map(function ($provider) {
        $provider->available_units_count = $provider->unitType->flatMap->units->count();
        return $provider;
    });

    return view('accommodation.index', compact('providers'));
}
public function listCarHireProviders(Request $request)
{
    $query = AccommodationProvider::with(['images', 'unitType.units','amenities'])
                ->where('type', 'Car Hire');

    // Apply search filter
    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('location', 'like', '%' . $request->search . '%')
              ->orWhereHas('amenities', function ($q2) use ($request) {
                  $q2->where('name', 'like', '%' . $request->search . '%');
              });
        });
    }
    if ($request->location && $request->location !== 'All Locations') {
        $query->where('location', $request->location);
    }


    $carHireProviders = $query->get();

    

    return view('car_hire.index', compact('carHireProviders'));
}
public function show($id)
{
    $provider = AccommodationProvider::with([
        'images',
        'unitType.units' => function($query) {
        $query->where('status', 'Available')
              ->select('id', 'name', 'price_per_day','unit_type_id','capacity');
    },
        'amenities' // if you want to include suites too
    ])->findOrFail($id);

    return view('accommodation.show', compact('provider'));
}

public function showCarhire($id) 
{
    $provider = AccommodationProvider::with([
        'images',
        'unitType.units' => function($query) {
            $query->where('status', 'Available')
                  ->select('id', 'name', 'price_per_day', 'unit_type_id', 'capacity');
        },
        'amenities'
    ])->findOrFail($id);

    return view('car_hire.show', compact('provider'));
}

}
