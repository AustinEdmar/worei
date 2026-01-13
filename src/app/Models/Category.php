<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
        'category_id',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function category()
    {
        return $this->belongsTo(Post::class);
    }
}
