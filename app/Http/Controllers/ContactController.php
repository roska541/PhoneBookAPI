<?php

namespace App\Http\Controllers;

use App\CallLog;
use App\Contact;
use App\Http\Requests\StoreContact;
use App\Http\Requests\UpdateContact;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('first_name')->get();

        return response()->json(['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContact $request)
    {
        $validated = $request->validated();

        $contact = new Contact();
        $contact->fill($validated);
        $contact->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Contact Saved'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $contact = Contact::findOrFail($id);
        }catch (\Exception $e){
            return response()->json([
                'message' => 'Contact was not found'],
            500);
        }

        return response()->json(['contact' => $contact]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContact $request, Contact $contact)
    {
        $validated = $request->validated();

        $contact->fill($validated);
        $contact->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Contact Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        try{
            CallLog::where('contact_from_id', '=', $contact->id)->delete();
            $contact->delete();
        }catch (\Exception $e){
            return reponse()->json([
                'status' => 'error',
                'message' => 'There was an error trying to delete the contact'
            ], 500);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Contact deleted'
        ]);

    }

    public function search(Request $request){

        $request->validate([
            'first_name' => 'string|required_without_all:last_name,phone_number',
            'last_name' => 'string|required_without_all:first_name,phone_number',
            'phone_number' => 'string|phone|required_without_all:first_name,last_name',
        ]);
        $contacts = Contact::query();

        if($request->has('first_name')){
            $contacts->where('first_name','like','%'. $request->first_name . '%');
        }
        if($request->has('last_name')){
            $contacts->where('last_name','like','%'. $request->last_name . '%');
        }
        if($request->has('phone_number')){
            $contacts->where('phone_number','like','%'. $request->phone_number . '%');
        }
        $contacts = $contacts->get();

        if(empty($contacts)){
            return response()->json(['message' => 'No contacts where found']);
        }else{
            return response()->json(['contacts' => $contacts]);
        }


    }
}
