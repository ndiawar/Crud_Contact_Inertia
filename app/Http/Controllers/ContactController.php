<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return Inertia::render(
            'Contacts/Index',
            [
                'contacts' => $contacts
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render(
            'Contacts/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'tel' => 'required',
        ]);
        Contact::create([
            'first_name' => $request->first_name,
            'name' => $request->name,
            'tel' => $request->tel
        ]);
        sleep(1);

        return redirect()->route('contacts.index')->with('message', 'Contact Created Successfully');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return Inertia::render(
            'Contacts/Edit',
            [
                'contact' => $contact
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'tel' => 'required',
        ]);

        $contact->first_name = $request->first_name;
        $contact->name = $request->name;
        $contact->tel = $request->tel;
        $contact->save();
        sleep(1);

        return redirect()->route('$contacts.index')->with('message', 'c$contact Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        sleep(1);

        return redirect()->route('$contacts.index')->with('message', 'con$contact Delete Successfully');
    }
}
