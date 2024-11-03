<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'by_user_id'
        );
    }
    // Listing:: create([
    //     'beds' => 2, 'baths' => 2, 'area' => 100, 'city' => 'North', 'street' => 'Tinker st', 'street_nr' => 20, 'code' => 'TS', 'price' => 200_000
    //   ])

}
