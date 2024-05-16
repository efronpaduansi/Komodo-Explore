<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $table = 'guests';
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'address',
        'city',
        'country',
        'dateofbirth',
        'gender',
        'nationality',
    ];
}
