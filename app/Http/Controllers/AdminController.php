<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourRequest;
use App\Models\cour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
  
    public function index()
    {
        if (auth()->user()->role ===1) {
            $users = User::all();
            return  view('user.index', compact('users'));
        }
        else {
            $cours = cour::all();
            return  view('cours.index', compact('cours'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('cour.create');
     
        return view('user.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourRequest $request )
    {
        $coure = new Cour;
        $coure->user_id = Auth::user()->id;
        $coure->Name_cour = $request->input('Name_cour');
        $coure->Detail_cour = $request->input('Detail_cour');
        $coure->Name_prof = $request->input('Name_prof');
        $coure->Name_domaine = $request->input('Name_domaine');
        $coure->Name_brache = $request->input('Name_brache');
        $coure->Ecole_name = $request->input('Ecole_name');
        $coure->Ecole_email = $request->input('Ecole_email');
        if ($request->hasFile('Path_file')) {
            $path = $request->Path_file->store('fichiers');
           $coure->Path_file=$path;
        }
        $coure->save();

        return redirect()->route('cours.index');
        // return redirect('/cours')->with('success', 'cour créer avec succèss');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coure = Cour::findOrFail($id);

        return view('user.detail', compact('coure')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $users = User::find($id);

        return view('user.edit' , compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourRequest $request, $id)
    {  
        $coure = User::find($id);
        $coure->name = $request->input('name');
        $coure->name = $request->input('email');
        $coure->password = $request->input('password');
        
        // if ($request->hasFile('Path_file')) {
        //     $path = $request->Path_file->store('fichiers');
        //    $coure->Path_file=$path;
        // }

        $coure->update();

        return redirect('user.index')->with('success', 'cour mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cour = User::find($id);
        $cour->delete();
        return redirect()->back()->with('status','user  Deleted Successfully');
    }

}
