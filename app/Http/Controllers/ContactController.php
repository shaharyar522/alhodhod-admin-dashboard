<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the first 5 records from DB
        $contacts = ContactUs::orderBy('id')->take(5)->get();

        return view('contact_us.index', compact('contacts'));
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

        // Fetch first 5 from DB
        $existingContacts = ContactUs::orderBy('id')->take(5)->get();

        foreach ($contacts as $index => $contactData) {
            if (isset($existingContacts[$index])) {
                // Update existing record
                $existingContacts[$index]->update($contactData);
            } else {
                // Create new if less than 5 exist
                ContactUs::create($contactData);
            }
        }

        return redirect()->back()->with('success', 'Contacts updated successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(ContactUs $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUs $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactUs $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contact)
    {
        //
    }
}
