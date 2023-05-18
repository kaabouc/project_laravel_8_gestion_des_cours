<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourRequest;
use App\Models\cour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours = Cour::paginate(8);
       // $cours = Cour::where('user_id',Auth::user()->id)->get();
      //  $cours = $filier->Cours();
        return view('cour.index', compact('cours'));
    }
     
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('cour.create');
     
        return view('cour.create');    
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

        return view('cour.detail', compact('coure')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $coure = Cour::find($id);

        return view('cour.edit' , compact('coure'));
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
        $coure = Cour::find($id);
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

        $coure->update();

        return redirect('/cours/'.$coure->id)->with('success', 'cour mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cour = cour::find($id);
        $cour->delete();
        return redirect()->back()->with('status','Student Deleted Successfully');
    }

    public function downloadfile($filename){

        $filepath=storage_path('app/'.$filename);
        if(file_exists($filepath)){
            return response()->download('$filepath');

        }else{
            return abort(404);
        }
    }

    // public function search(Request $request)
    //   {
    // $term = $request->input('term');
    // $cours = cour::where('Name_cour', 'like', '%'.$term.'%')
    //                     ->orWhere('Name_brache', 'like', '%'.$term.'%')
    //                     ->orWhere('Name_prof', 'like', '%'.$term.'%')
    //                     ->orWhere('Ecole_name', 'like', '%'.$term.'%')
    //                     ->orderBy('Name_domaine', 'desc')
    //                     ->get();
    // return view('cour.index', compact('cours', 'term'));
    // }
    
}
