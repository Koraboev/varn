<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasTranslations;
    use HasFactory;
    protected  $fillable=[
        'name',
        'title',
        'description',
        'image',
        'job_type',
        'rating'
    ];
    public $translatable=[
        'name',
        'title',
        'description',
        'job_type',
    ];
    protected $casts = [
        'name'=>'array',
        'title'=>'array',
        'description'=>'array',
        'job_type'=>'array',
    ];
}
