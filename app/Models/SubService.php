<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SubService extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'service_id',
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
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
