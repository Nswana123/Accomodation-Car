<?php

namespace App\Http\Controllers;
use App\Models\UnitSuite;
use Illuminate\Http\Request;

class SuiteController extends Controller
{
   public function index(Request $request)
{
    $query = UnitSuite::with(['provider.images']);

    // Optional search by name, description, or provider location
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where('name', 'like', "%$search%")
              ->orWhere('description', 'like', "%$search%")
              ->orWhereHas('provider', function ($q) use ($search) {
                  $q->where('location', 'like', "%$search%");
              });
    }

    // Optional location filter
    if ($request->filled('location') && $request->location !== 'All Locations') {
        $query->whereHas('provider', function ($q) use ($request) {
            $q->where('location', $request->location);
        });
    }

    $suites = $query->get();

    return view('suites.index', compact('suites'));
}
}
