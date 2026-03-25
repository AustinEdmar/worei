<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // return view('dashboard.about.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        About::create($request->all());

        return redirect()->route('admin.about.index')
            ->with('success', 'About created successfully.');
    }

    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $about->update($request->all());

        return redirect()->route('admin.about.index')
            ->with('success', 'About updated successfully.');
    }

    public function destroy(About $about)
    {
        $about->delete();

        return redirect()->route('admin.about.index')
            ->with('success', 'About deleted successfully.');
    }
}
