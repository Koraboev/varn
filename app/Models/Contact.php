<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Contact extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'address',
        'phone1',
        'phone2',
        'email1',
        'email2',
        'work_time',
        'facebook',
        'linkedin',
        'instagram',
        'youtube',
        'telegram',
        'text'
    ];

    public array $translatable = [
        'address',
        'work_time',
        'text'
    ];

    protected $casts = [
        'address' => 'array',
        'work_time' => 'array',
        'text' => 'array',
    ];
}
