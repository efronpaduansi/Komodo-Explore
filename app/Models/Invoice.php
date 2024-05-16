<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'number',
        'date',
        'guests_id',
        'bookings_id',
        'total',
        'status',
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guests_id', 'id');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'bookings_id', 'id');
    }
}
