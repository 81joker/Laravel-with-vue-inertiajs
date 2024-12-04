<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RealtorListingController extends Controller
{
    use AuthorizesRequests;


    // public function __construct()
    // {
    //     $this->authorizeResource(Listing::class, 'listing');

    // }

    public function index(Request $request)
    {
        // https://laravel.com/docs/11.x/requests
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order'])
        ];
        // $query = Auth::user()->listings()->withTrashed()->get();
        // if ($filters['deleted_at'] ?? false) {
        //     // Only include soft-deleted records
        //     $query->onlyTrashed()->get();
        // }
        // dd(Auth::user()->listings());
        return inertia(
            'Realtor/Index',
            [
                'filters' => $filters,
                'listings' => Auth::user()->listings()
                    // ->mostRecent()
                    ->filter($filters)
                    ->paginate(4)
                    ->withQueryString()
                // 'filters' =>  $filters,
                // 'listings' =>  $query,
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        // $response = Gate::inspect('view', $listing);
         // if (Auth::user()->cannot('view', $listing)) {
        //     abort(403);
        // }
        // $this->authorize('view', $listing);
   
        return inertia(
        'Realtor/Show',
        [
            'listing' => $listing
        ]
    );
    }

 /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Realtor/Create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // Validate and create the listing
        $data = $request->validate([
            'beds' => 'required|integer|min:0|max:20',
            'baths' => 'required|integer|min:0|max:20',
            'area' => 'required|integer|min:15|max:1500',
            'city' => 'required',
            'code' => 'required',
            'street' => 'required',
            'street_nr' => 'required|min:1|max:1000',
            'price' => 'required|integer|min:1|max:20000000',
        ]);

        // Create the listing logic here
        // Listing::create( $data);
        $request->user()->listings()->create($data);

        return redirect()->route('listing.index')->with('success', 'Listing created successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia(
            'Realtor/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );
        return redirect()->route('realtor.listing.index')
            ->with('success', 'Realtor Listing was changed!');
    }

    public function destroy(Listing $listing)
    {
        // Delete the model from the database within a transaction.
        // https://laracasts.com/discuss/channels/laravel/laravel-delete-all-with-relation
        $listing->deleteOrFail();
        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
    public function restore(Listing $listing)
    {
        $listing->restore();
        return redirect()->back()->with('success', 'Listing was restored!');
    }
    
}
