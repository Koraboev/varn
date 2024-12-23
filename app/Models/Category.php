<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'name',
    ];

    public array $translatable = ['name'];

    protected $casts = ['name'=>'array'];


    public function posts(){
        return $this->hasMany(Post::class);
    }
}
