<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
       
       // $cours = Cour::where('user_id',Auth::user()->id)->get();
      //  $cours = $filier->Cours();
        return view('Contact.index', compact('contact'));
    }
     
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('cour.create');
     
        return view('contact.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $coure = new Contact;
        $coure->Name = $request->input('Name');
        $coure->Subject = $request->input('Subject');
        $coure->Email = $request->input('Email');
        $coure->Message = $request->input('Message');
        $coure->save();
        return redirect()->route('cours.index');
        // return redirect('/cours')->with('success', 'cour créer avec succèss');
    }

  
   
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cour = Contact::find($id);
        $cour->delete();
        return redirect()->back()->with('status','cour Deleted Successfully');
    }
}
