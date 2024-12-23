<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Specialist extends Model
{
    use HasFactory;
    use HasTranslations;
    public $fillable = [
        'specialist_image',
        'specialist_name',
        'specialist_job',
        'description',
        'images',
        'status',
    ];
    public $translatable = [
        'description',
        'specialist_name',
        'specialist_job'
    ];

    protected $casts = [
        'images' => 'array',
        'description' => 'array',
        'specialist_name' => 'array',
        'specialist_job' => 'array'
    ];
}
