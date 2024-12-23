<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'text',
        'images',
    ];
    public array $translatable = [
        'text',
    ];

    protected $casts = [
        'text' => 'array',
        'images' => 'array',
    ];
}
