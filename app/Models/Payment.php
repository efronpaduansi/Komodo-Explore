<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = [
        'guests_id',
        'bookings_id',
        'total_price',
        'payment_status',
        'payment_method',
        'payment_date',
        'notes',
        'payment_channels_id',
        'invoices_id',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'bookings_id', 'id');
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guests_id', 'id');
    }

    public function channel()
    {
        return $this->belongsTo(PaymentChannel::class, 'payment_channels_id', 'id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoices_id', 'id');
    }
}
