<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Requests\StoreContactRequest;
use Yajra\Datatables\Datatables;

class ContactController extends Controller
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
     * get all contacts view to datatable
     */
    public function getContacts(Request $request)
    {   
        if ($request->ajax()) {
            $user = \Auth::user();
            $contacts = $user->contacts()->get();
            return Datatables::of($contacts)->make(true);
        }
    }

    /**
     * get contacts by users to lazyload
     */
    public function getLazyContacts(Request $request, $id)
    {
        $user = User::find($id);
        $data['user'] = $user;

        if($request->ajax()){
            
            $contacts = $user->contacts()->paginate(12);
            return response()->json(['data' => $contacts]);
        }
        return view('contacts.lazyload', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        //
        $contact = New Contact;
        $contact->user_id = \Auth::user()->id;
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->phone_number = $request->get('phone_number');

        $contact->save();

        return redirect('/home')->with('status', 'contact Created!');
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
        //
        $data['contact'] = $contact;
        return view('contacts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->phone_number = $request->get('phone_number');
        $contact->save();

        return redirect('/home')->with('status', 'Contact Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
        $contact->delete();
        
        return redirect('/home')->with('deleted', 'Contact Deleted!');
    }
}
