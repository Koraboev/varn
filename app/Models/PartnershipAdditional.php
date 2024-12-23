<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PartnershipAdditional extends Model
{

    use HasFactory;
    protected $fillable = [
        'top_content',
        'bottom_content',
        'lang-id'
    ];
    protected $casts = [
        'top_content' => 'array',
        'bottom_content' => 'array',
    ];


}
