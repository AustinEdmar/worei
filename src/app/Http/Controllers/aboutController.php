<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class aboutController extends Controller
{

    public function index()
    {
        $abouts = About::latest()->paginate(5);

        if (request()->is('dashboard/*')) {
            return view('dashboard.about.index', compact('abouts'));
        }

        return view('site.about', compact('abouts'));
    }

    public function store(Request $request)
    {

        //dd($request->all());

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('about', 'public');
            $data['image'] = $path;
        }

        About::create($data);

        return redirect()->route('dashboard.about.index')
            ->with('success', 'About criado com sucesso.');
    }


    public function edit(About $about)
    {
        return view('dashboard.about.edit', compact('about'));
    }


    public function update(Request $request, About $about)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('about', 'public');

            $data['image'] = $path;
        }

        $about->update($data);

        return redirect()->route('dashboard.about.index')
            ->with('success', 'About atualizado.');
    }


    public function destroy(About $about)
    {
        $about->delete();

        return redirect()->route('dashboard.about.index')
            ->with('success', 'About removido.');
    }
}
