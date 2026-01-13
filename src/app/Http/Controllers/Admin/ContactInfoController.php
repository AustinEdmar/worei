<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {

        $contactsinfo = ContactInfo::latest()->paginate(5);

        return view('dashboard.contactinfo.index', [
            'contactsinfo' => ContactInfo::orderBy('id')->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type'  => 'required|string',
            'value' => 'required|string',
        ]);

        ContactInfo::create($data);

        return back()->with('success', 'Contacto adicionado');
    }

   public function update(Request $request, ContactInfo $contactInfo)
{
    $data = $request->validate([
        'type'  => 'required|string',
        'value' => 'required|string',
    ]);

    $contactInfo->update($data);

    return back()->with('success', 'Contacto atualizado com sucesso');
}


    public function destroy(ContactInfo $contactInfo)
    {
        $contactInfo->delete();
        return back()->with('success', 'Contacto removido');
    }
}
