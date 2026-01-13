<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactNotificationMail;


class ContactsController extends Controller
{
      /**
     * 📩 RECEBER DO FORMULÁRIO
     */
   
      public function store(Request $request)
{
    $data = $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    $data['ip_address'] = $request->ip();
    $data['user_agent'] = $request->userAgent();

    // 👇 model criado
    $contact = Contacts::create($data);

    // 👇 passa o MODEL, não array
    Mail::to(config('mail.from.address'))
        ->send(new ContactNotificationMail($contact));

    return back()->with('success', 'Mensagem enviada com sucesso!');
}


    /**
     * 📄 LISTAR (ADMIN)
     */
    public function index()
    {
        return view('admin.contacts.index', [
            'contacts' => Contacts::latest()->paginate(15)
        ]);
    }

    /**
     * 👁 VER DETALHES
     */
    public function show(Contacts $contacts)
    {
        return view('admin.contacts.show', compact('contacts'));
    }

    /**
     * 📦 ARQUIVAR
     */
    public function archive(Contacts $contacts)
    {
        $contacts->update(['status' => 'archived']);
        return back();
    }

    /**
     * 🗑 APAGAR
     */
    public function destroy(Contacts $contacts)
    {
        $contacts->delete();
        return back();
    }
}
