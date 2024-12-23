<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutVarn extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'experience',
        'skills',
        'image',
    ];
    public array $translatable = [
        'title',
        'description',
        'experience',
        'skills',
    ];
    protected $casts = [
        'skills' => 'array',
        'title'=>'array',
        'description'=>'array',
        'experience'=>'array',
    ];
}
