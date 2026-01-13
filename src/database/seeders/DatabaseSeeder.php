<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // Criar um usuário manualmente
        User::create([
            'name' => 'Austin Edmar',
            'email' => 'austin@gmail.com',
            'password' => bcrypt('923.po'), // sempre criptografe
        ]);

        // Criar uma categoria
        Category::create([
            'name' => 'Test Category',
            'slug' => 'test-category',
            'description' => 'This is a test category',
            'is_active' => true,
        ]);

        // Criar um post
        Post::create([
            'title' => 'Test Post',
            'slug' => 'test-post',
            'excerpt' => 'This is a test post',
            'content' => 'This is a test post',
            'featured_image' => 'test-image.jpg',
            'author_id' => 1,
            'category_id' => 1,
            'status' => 'published',
            'is_featured' => true,
            'published_at' => now(),
            'views' => 0,
        ]);

        // Criar imagem do post
        PostImage::create([
            'post_id' => 1,
            'image_path' => 'test-image.jpg',
            'caption' => 'This is a test image',
            'order' => 0,
        ]);
    }
}
