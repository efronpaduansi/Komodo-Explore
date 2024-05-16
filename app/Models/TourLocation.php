<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourLocation extends Model
{
    use HasFactory;

    protected $table = 'tour_locations';
    protected $fillable = [
        'thumbnail',
        'location_name',
        'description',
        'status',
    ];

    //Accessor
    public function getThumbnailAttribute($value)
    {
        return asset('uploads/images/' . $value);
    }
}
