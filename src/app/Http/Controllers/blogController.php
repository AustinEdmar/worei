<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class blogController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->paginate(5);
        $categories = Category::all();

        // Detecta automaticamente de onde foi chamado
        if (request()->is('dashboard/*')) {
            return view('dashboard.blog.index', compact('posts', 'categories'));
        }

        return view('site.blog.index', compact('posts', 'categories'));
    }


    public function create()
    {
        return view('dashboard.blog.create');
    }







    public function store(Request $request)
    {
        // Dados vindos diretamente do request (sem validação)
        $data = $request->all();

        // Cria slug e autor
        $data['slug'] = Str::slug($request->input('title'));
        $data['author_id'] = Auth::id() ?? 1;

        // Upload da imagem de destaque
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        // Cria o post
        $post = Post::create($data);

        // Upload de múltiplas imagens
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('posts', 'public');
                $post->images()->create(['image_path' => $path]);
            }
        }

        return redirect()
            ->route('dashboard.blog.index')
            ->with('success', 'Post criado com sucesso!');
    }



    public function show(Post $post)
    {
        $post = Post::findOrFail($post->id);
        // Detecta automaticamente de onde foi chamado
        if (request()->is('dashboard/*')) {
            return view('dashboard.blog.show', compact('post'));
        }

        return view('site.blog.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('dashboard.blog.edit', compact('post'));
    }






   public function update(Request $request, Post $post)
{
    // Atualiza campos simples
    $data = $request->only([
        'title',
        'content',
        'category_id',
        'status'
    ]);

    // Atualiza imagem de destaque
    if ($request->hasFile('featured_image')) {
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $data['featured_image'] = $request->file('featured_image')
            ->store('posts', 'public');
    }

    // Atualiza dados principais do post
    $post->update($data);

    /**
     * 🔥 Se enviar novas imagens:
     * 1. Remove todas as imagens antigas (arquivo + banco)
     * 2. Salva as novas imagens
     */
    if ($request->hasFile('images')) {

        // Remove imagens antigas
        foreach ($post->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        // Salva novas imagens
        foreach ($request->file('images') as $file) {
            $path = $file->store('posts', 'public');

            $post->images()->create([
                'image_path' => $path
            ]);
        }
    }

    return redirect()
        ->route('dashboard.blog.index')
        ->with('success', 'Post atualizado com sucesso!');
}





    public function destroy($id)
    {
        // Busca o post
        $post = Post::findOrFail($id);

        // Remove imagem principal (featured_image)
        if ($post->featured_image && Storage::disk('public')->exists($post->featured_image)) {
            Storage::disk('public')->delete($post->featured_image);
        }

        // Remove imagens relacionadas (se existirem)
        if ($post->images()->exists()) {
            foreach ($post->images as $image) {
                if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
                    Storage::disk('public')->delete($image->image_path);
                }
                $image->delete();
            }
        }

        // Deleta o post
        $post->delete();

        return redirect()
            ->route('dashboard.blog.index')
            ->with('success', 'Post excluído com sucesso!');
    }
}
