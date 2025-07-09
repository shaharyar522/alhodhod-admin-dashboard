<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::get();
        return view('contact_us.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contacts = $request->input('contacts', []);

    foreach ($contacts as $data) {
        Contact::create([
            'icon' => $data['icon'] ?? null,
            'en_title' => $data['en_title'] ?? null,
            'en_value' => $data['en_value'] ?? null,
            'fr_title' => $data['fr_title'] ?? null,
            'fr_value' => $data['fr_value'] ?? null,
            'ar_title' => $data['ar_title'] ?? null,
            'ar_value' => $data['ar_value'] ?? null,
        ]);
    }

    return redirect()->back()->with('success', 'Contacts saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
