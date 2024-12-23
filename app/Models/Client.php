<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Client extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'image',
        'lang_id'
    ];
    protected $casts = [
        'title' => 'array',
        'description' => 'array',
    ];
}
