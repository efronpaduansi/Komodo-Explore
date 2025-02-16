<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
    use HasFactory;

    protected $table = 'web_settings';

    protected $fillable = [
        'company_name',
        'about_tags',
        'about_text',
        'email',
        'phone',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
    ];
}
