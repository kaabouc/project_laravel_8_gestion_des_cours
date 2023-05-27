<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourRequest;
use App\Models\cour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\AdminMiddleware;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminMiddleware')->only(['index', 'edit', 'create']);
    }
    public function index()
    {
      
        //$users = User::all();
        $users = User::where('role', '!=', 1)->get();
       // $cours = Cour::where('user_id',Auth::user()->id)->get();
      //  $cours = $filier->Cours();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('user.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $user = new User;
        $user->name =$request->input('name');
        $user->description_user = $request->input('description_user');
        $user->fonction_user = $request->input('fonction_user');
        $user->email = $request->input('email');
         $password = $request->input('password');
         $hashedPassword = Hash::make($password);
        $user->password = $hashedPassword ; 

        if ($request->hasFile('photo_user')) {
            $path = $request->photo_user->store('profile_pictures', 'public');
           $user->photo_user=$path;
        }
        $user->save();

        return redirect()->route('users.index');
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
        $user=User::findOrFail($id);
        $cours = Cour::where('user_id',$id)->get();

        return view('user.detail', compact('cours','user')); 
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = User::find($id);

        return view('user.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        $user = User::find($id);
        $user->name =$request->input('name');
        $user->description_user = $request->input('description_user');
        $user->fonction_user = $request->input('fonction_user');
        $user->email = $request->input('email');
         $password = $request->input('password');
         $hashedPassword = Hash::make($password);
        $user->password = $hashedPassword ; 

        if ($request->hasFile('photo_user')) {
            $path = $request->photo_user->store('profile_pictures', 'public');
           $user->photo_user=$path;
        }
        $user->update();

        return  redirect()->route('cours.index')->with('success', 'user mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('status','user Deleted Successfully');
    }

}
