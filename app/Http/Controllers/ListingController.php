<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        return inertia(
            'Listing/Index',
            [
                'listings' => Listing::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Listing/Create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // Validate and create the listing
        $data = $request->validate([
            'beds' => 'required|integer',
            'baths' => 'required|integer',
            'area' => 'required|integer',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'street_nr' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        // Listing::create($request->all());
        // Create the listing logic here
        Listing::create($data);

        return redirect()->route('listing.index')->with('success', 'Listing created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return inertia(
        'Listing/Show',
        [
            'listing' => $listing
        ]
    );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
