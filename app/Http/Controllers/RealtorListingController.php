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
        return inertia('Realtor/Index',
        [
            'filters' => $filters,
            'listings' => Auth::user()->listings()
            // ->mostRecent()
            ->filter($filters)
            ->get()
            // 'filters' =>  $filters,
            // 'listings' =>  $query,
            ]
        );
    }

    public function destroy(Listing $listing)
    {
        // Delete the model from the database within a transaction.
        // https://laracasts.com/discuss/channels/laravel/laravel-delete-all-with-relation
        $listing->deleteOrFail();
        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
}
