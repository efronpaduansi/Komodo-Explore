<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    use HasFactory;
    protected $table = 'tour_packages';
    protected $fillable = [
        'thumbnail',
        'package_name',
        'slug',
        'description',
        'duration',
        'price',
        'participant',
        'hotels_id',
        'restaurants_id'
    ];

    //thumbnail accessor
    public function getThumbnailAttribute($value)
    {
        return asset('uploads/images/' . $value);
    }

    // public function getPriceAttribute($value)
    // {
    //     return "Rp." . number_format($value, 0, '.', '');
    // }

    // public function getParticipantAttribute($value)
    // {
    //     return $value . " Orang";
    // }

    //relasi pada tabel tour package
    public function locations()
    {
        return $this->belongsToMany(TourLocation::class, 'tour_package_locations', 'tour_packages_id', 'tour_locations_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotels_id', 'id');
    }

    public function resto()
    {
        return $this->belongsTo(Restaurant::class, 'restaurants_id', 'id');
    }
}
