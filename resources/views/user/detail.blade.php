<!--index.blade.php -->

@extends('layouts.app')

@section('content')
         
<style>
  
  .circle-container {
  width: 150px; /* Adjust the width and height as needed */
  height: 150px;
  border-radius: 50%; /* Creates a circular shape */
  overflow: hidden; /* Clips the image within the circular shape */
}
  .uper {
    margin-top: 40px;
  }
</style>

<div class="uper">

  @if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div><br />
  @endif
   

  <div class="container">
 <div class="row">
    <div class="col-md-6">

          <div class="form-group">
              <label for="Name_cour" style="font-size: 30px;"> Nom de utlisateur : {{ $user->name}}</label>
              
          </div>
          <div class="form-group">
              <label for="">email de utlisateur  :{{ $user->email}} </label>
              </div>
              <div class="form-group">
              <label for="">fonction de etulisateur  :{{ $user->fonction_user}} </label>
              </div>
              <div class="form-group">
              <label for="">description sur etulisateur  :{{ $user->description_user}} </label>
              </div>
          <a class="btn btn-primary" href="{{ route('cours.index')}}" >menu</a> 
         <br>

     </div>
    <div class="col-md-6">
    <!-- <div class="circle-container"> -->
    <img class="card-img-top" src="{{ asset('storage/'.$user->photo_user)}}" style="height: 300px; width: 240px; border-radius:50% ; overflow: hidden;" alt="Card image cap">
<!-- </div> -->
@guest
  
  <!-- Code pour les utilisateurs invités -->
       @else
       @if (Route::has('login') || Route::has('registre'))
         @php
          $currentUser = auth()->user();
          $courseUser = $user;
        @endphp

       @if (($currentUser && $courseUser && $currentUser->id === $courseUser->id) || ($currentUser && $currentUser->role == 1))
      <br> <a href="{{ route('cours.create')}}" class="btn btn-primary">Ajouter</a>
       <td><a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary">Modifier les information </a></td>
       @endif
  @endif
@endguest
      
  </div>
   <hr>
 
 

<div class="row">
  
@foreach($cours as $item)
    <div class="card" style="width: 18rem; margin: 20px; ">
   
      <img class="card-img-top" src="{{ url('images/livre_logo.jpg')}}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">{{ $item->Name_cour}}  cree par <br><a style="color:red ;" href="{{ route('user',$item->user->id) }}">{{$item->user->name}} </a></h5>
        <p class="card-text"> cour of university {{$item->Ecole_name}}  .</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">nom de professer {{ $item->Name_prof}}</li>
        <li class="list-group-item">{{$item->Name_domaine}}</li>
        
      </ul>
      <div class="card-body">
        <a href="{{ route('download',substr($item->Path_file ,9)) }}" class="card-link">download</a>
        <a href="{{ route('cours.show', $item->id)}} " class="btn btn-primary" class="card-link">detail </a>
      </div>
    </div>
    @endforeach

  
</div>


  <div>
    @endsection