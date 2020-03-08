<?php

namespace App\Http\Controllers;

use App\CallLog;
use App\Contact;
use Illuminate\Http\Request;

class CallLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CallLog  $CallLog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $contactFrom = Contact::where('id',$id)->with('outbound')->with('inbound')->firstOrFail();
        }catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Contact not found'
            ]);
        }
        return response()->json([
            'contact' => $contactFrom,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CallLog  $CallLog
     * @return \Illuminate\Http\Response
     */
    public function edit(CallLog $CallLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CallLog  $CallLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CallLog $CallLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CallLog  $CallLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(CallLog $CallLog)
    {
        //
    }
}
