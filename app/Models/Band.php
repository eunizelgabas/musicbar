<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Band extends Model
{
    use HasFactory;
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    protected $table = 'bands';

    protected $guarded = [];

    public function scopeSearch($query, $terms){
        collect(explode(" ", $terms))
        ->filter()
        ->each(function($term) use ($query){
            $term = '%' .$term . '%';
            $query->where('band_name', 'like', $term);

        });
    }
}
