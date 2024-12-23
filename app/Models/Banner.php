<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Banner extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'title',
        'short_content',
        'images'
    ];
    public array $translatable = [
        'title',
        'short_content',
    ];
    protected $casts = [
        'images' => 'array',
        'short_content' => 'array',
        'title'=>'array',
    ];
}
