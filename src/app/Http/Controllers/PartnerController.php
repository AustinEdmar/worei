<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function index()
    {

        $partners = Partner::orderBy('order')->paginate(10);

        return view('dashboard.partners.index', compact('partners'));

    }

    public function store(Request $request)
    {

        // dd($request->all());

        $data = $request->validate([

            'name' => 'required',
            'logo' => 'required|image',
            'website' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable'

        ]);

        if ($request->hasFile('logo')) {

            $path = $request->file('logo')->store('partners', 'public');

            $data['logo'] = $path;

        }

        $data['is_active'] = $request->has('is_active');

        Partner::create($data);

        return back()->with('success', 'Parceiro criado');

    }

    public function update(Request $request, Partner $partner)
    {



        $data = $request->validate([

            'name' => 'required',
            'logo' => 'nullable|image',
            'website' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable'

        ]);

        if ($request->hasFile('logo')) {

            $path = $request->file('logo')->store('partners', 'public');

            $data['logo'] = $path;

        }

        $data['is_active'] = $request->has('is_active');

        $partner->update($data);

        return back()->with('success', 'Atualizado');

    }

    public function destroy(Partner $partner)
    {

        $partner->delete();

        return back()->with('success', 'Removido');

    }

}
