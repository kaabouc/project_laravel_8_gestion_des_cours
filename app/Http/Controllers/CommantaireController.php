<?php

namespace App\Http\Controllers;

use App\Models\Commantaire;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommantaireController extends Controller
{
    public function index()
    {
        $comm = Commantaire::all();
       // $cours = Cour::where('user_id',Auth::user()->id)->get();
      //  $cours = $filier->Cours();
        return view('commantaire.index', compact('comm'));
    }
     
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('Commantaire.create');    
    }
    public function store(Request $request )
    {
        $coure = new Commantaire;
        $coure->user_id = Auth::user()->id;
        $coure->Name = $request->input('Name');
        $coure->Detail_comm = $request->input('Detail_comm');
        $coure->Email = $request->input('Email');
        $coure->Cour_id = $request->input('Cour_id');
        $coure->save();

        return  redirect('/commantaire/'.$coure->Cour_id)->with('success', 'filier mise à jour avec succèss');
        // return redirect('/cours')->with('success', 'cour créer avec succèss');
    }
    public function detail($id)
    {
        $commantaire = Commantaire::where('Cour_id',$id)->get();
       
        return view('Commantaire.detail')->with(compact('commantaire','id'));    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commantaire = Commantaire::where('Cour_id',$id)->get();
        return view('Commantaire.detail', compact('commantaire'));

       
    }
}
