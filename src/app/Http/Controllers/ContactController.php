<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Author;
use Illuminate\Http\Request;



class ContactController extends Controller
{
    public function create(){
        return view('index');
    }

    public function confirm(ContactRequest $request){
        $contact = $request->only(['last-name','first-name','gender','email','postal-code','home-address','building','content']);
        $request->session()->put('contact', $contact);

        $contact['full-name'] = $contact['last-name'].''. $contact['first-name'];


        return view('confirm', ['contact' => $contact]);
    }
    public function edit(ContactRequest $request)
    {
        $contact = $request->session()->get('contact');
        if (!$contact) {
            return redirect()->route('contacts.create');
        }
        return redirect()->route('contacts.create')->withInput($contact);
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->session()->get('contact');
        if (!$contact){
            return redirect()->route('contacts.create');
        }

        $contact['full-name'] = $contact['last-name'] . '' . $contact['first-name'];
        unset($contact['last-name'], $contact['first-name']);

        Author::create($contact);

        $request->session()->forget('contact');

        return view('thanks');
    }
}

