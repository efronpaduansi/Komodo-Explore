<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentChannel extends Model
{
    use HasFactory;
    protected $table = 'payment_channels';
    protected $fillable = [
      'bank_name', 'bank_number', 'name', 'logo', 'status',
    ];

    //accessor for logo
    public function getLogoAttribute($value)
    {
        return asset('uploads/images/' . $value);
    }
}
