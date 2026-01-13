<?php

namespace App\Models;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'image',
        'author_id',
        'status',
        'is_featured',
        'published_at',
        'views',
        'category_id',
    ];

        public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Gera slug automaticamente
    protected static function booted()
    {
        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }

}
