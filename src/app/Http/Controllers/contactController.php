<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use App\Models\Faqs;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function index()
    {

        $contactsinfo = ContactInfo::limit(3)->get();
        $faqs = Faqs::all();
        return view('site.contact', [
            'contactsinfo' => $contactsinfo,
            'faqs' => $faqs
        ]);
    }
}
