<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;



class ListingController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');

    }

    // public function __construct(){
    //     $this->middleware("auth")->except(["index"]);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);

        // $query = Listing::mostRecent();
        // // $query = Listing::orderByDesc('created_at');
        // if ($filters['priceFrom'] ?? false) {
        //     $query->where('price', '>=', $filters['priceFrom']);
        // }
        // if ($filters['priceTo'] ?? false) {
        //     $query->where('price', '<=', $filters['priceTo']);
        // }
        // if ($filters['beds'] ?? false) {
        //     $query->where('beds', $filters['beds']);
        // }
        // if ($filters['baths'] ?? false) {
        //     $query->where('baths', $filters['baths']);
        // }
        // if ($filters['areaFrom'] ?? false) {
        //     $query->where('area', '>=', $filters['areaFrom']);
        // }
        // if ($filters['areaTo'] ?? false) {
        //     $query->where('area', '<=', $filters['areaTo']);
        // }
        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                // 'listings' => $query->paginate(10),
                'listings' => Listing::mostRecent()
                ->withoutSold()
                ->filter($filters)->
                paginate(10)->withQueryString()
                // 'filters' => $request->only([
                //     'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
                // ]),
                // 'listings' => Listing::orderByDesc('created_at')->paginate(10)
                // 'listings' => Listing::orderByDesc('created_at')
                //     ->when(
                //         $filters['priceFrom'] ?? false,
                //         fn ($query, $value) => $query->where('price', '>=', $value)
                //     )->when(
                //         $filters['priceTo'] ?? false,
                //         fn ($query, $value) => $query->where('price', '<=', $value)
                //     )->when(
                //         $filters['beds'] ?? false,
                //         fn ($query, $value) => $query->where('beds', (int)$value < 6 ? '=' : '>=', $value)
                //     )->when(
                //         $filters['baths'] ?? false,
                //         fn ($query, $value) => $query->where('baths', (int)$value < 6 ? '=' : '>=', $value)
                //     )->when(
                //         $filters['areaFrom'] ?? false,
                //         fn ($query, $value) => $query->where('area', '>=', $value)
                //     )->when(
                //         $filters['areaTo'] ?? false,
                //         fn ($query, $value) => $query->where('area', '<=', $value)
                //     )->paginate(10)->withQueryString()
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


        $offer = !Auth::user() ? null : $listing->offers()->byMe()->first();
        // if (Auth::user()) {
        //     $offer = $listing->offers()->where('bidder_id', Auth::id())->first();
        //     // $offer = $listing->offers()->where('bidder_id', Auth::user()?->id)->first();
        // }
        $listing->load(['images']);
                // dd($listing);
        return inertia(
        'Listing/Show',
        [
            'listing' => $listing,
            'offerMade' => $offer
        ]
    );
    }
}
