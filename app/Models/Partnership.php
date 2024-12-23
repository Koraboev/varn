<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Partnership extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'flag_image',
        'company_name',
        'company_link',
        'country_name',
        'city_name',
    ];
    public $translatable = [
        'company_name',
        'country_name',
        'city_name',
    ];
    protected $casts = [
        'country_name' => 'array',
        'city_name' => 'array',
        'company_name' => 'array',
    ];
}
