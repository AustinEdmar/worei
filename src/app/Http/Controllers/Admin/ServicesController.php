<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\Storage;



class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $services = Services::latest()->paginate(5);
       

        if (request()->is('dashboard/*')) {
            return view('dashboard.service.index', compact('services'));
        }

        return view('site.services', compact('services')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
   


    public function store(Request $request)
   {
    $data = $request->all();

    if ($request->hasFile('image')) {
        $data['image'] =
            $request->file('image')->store('services', 'public');
    }

    Services::create($data);

    return redirect()
        ->back()
        ->with('success', 'Serviço criado com sucesso!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Services $services)
{
    // Pegamos apenas os campos que existem no banco
    $data = $request->only([
        'title',
        'content',
        'is_active',
        'is_featured',
    ]);

    // Upload da nova imagem
    if ($request->hasFile('image')) {
        // Remove antiga se existir
        if ($services->image && Storage::disk('public')->exists($services->image)) {
            Storage::disk('public')->delete($services->image);
        }

        // Salva a nova
        $data['image'] = $request->file('image')->store('services', 'public');
    }

    // Atualiza o registro
    $services->update($data);

    return redirect()
        ->route('dashboard.services.index')
        ->with('success', 'Serviço atualizado com sucesso!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $services)
{
    if ($services->image && Storage::disk('public')->exists($services->image)) {
        Storage::disk('public')->delete($services->image);
    }

    $services->delete();

    return redirect()
        ->route('dashboard.services.index')
        ->with('success', 'Serviço removido com sucesso!');
}

}
