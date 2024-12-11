<?php

namespace App\Http\Controllers;

use App\Models\Offer;

class RealtorListingAcceptOfferController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Offer $offer)
    {
        // dd($offer->accepted_at);
        // Accept selected offer
        $offer->update(['accepted_at'=> now()]);

        // Reject slected offer
        $offer->listing->offers()->except($offer)->update(['rejected_at' => now()]);
        return redirect()->back()->with('success' , "Offer #{$offer->id} accepted, other offers rejected");
    }
}