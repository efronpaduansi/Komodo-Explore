<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'number',
        'guests_id',
        'tour_packages_id',
        'participant_count',
        'date',
        'status',
    ];

    public function guests()
    {
        return $this->belongsTo(\App\Models\Guest::class);
    }

    public function packages()
    {
        return $this->belongsTo(\App\Models\TourPackage::class, 'tour_packages_id', 'id');
    }
}
