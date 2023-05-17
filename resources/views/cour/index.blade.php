<!--index.blade.php -->

@extends('layouts.app')

@section('content')
         
<style>
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
  @guest
    <!-- Code pour les utilisateurs invités -->
         @else
          @if (Route::has('login') || Route::has('registre'))
         <a href="{{ route('cours.create')}}" class="btn btn-primary">Ajouter</a>
        
    @endif
@endguest
 

<div class="row">
  
@foreach($cours as $item)
    <div class="card" style="width: 18rem; margin: 20px; ">
   
      <img class="card-img-top" src="{{ url('images/hihi.jpeg')}}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">{{ $item->Name_cour}}  cree par <br><a style="color:red">{{$item->user->name}} </a></h5>
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