<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
    public array $translatable = [
        'name',
        'slug',
        'description',
    ];

    protected $casts = [
        'name' => 'array',
        'slug' => 'array',
        'description' => 'array',
    ];
public function subServices()
{
    return $this->hasMany(SubService::class);
}

}
