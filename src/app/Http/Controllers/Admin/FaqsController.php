<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faqs;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $faqs = Faqs::latest()->paginate(5);

        return view('dashboard.faq.index', [
            'faqs' => Faqs::orderBy('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         
        $data = $request->validate([
            'question'  => 'required|string',
            'answer' => 'required|string',
        ]);

        Faqs::create($data);

        return back()->with('success', 'Pergunta adicionada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faqs $faq)
    {
        return view('dashboard.faq.show', compact('faq'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faqs $faq)
    {
        return view('dashboard.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faqs $faq)
    {
        $faq->update($request->all());
        return back()->with('success', 'Pergunta atualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faqs $faq)
    {
        $faq->delete();
        return back()->with('success', 'Pergunta removida');
    }
}
