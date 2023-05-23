@extends('layouts.app')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    detail de cour 
  </div>

  <div class="card-body">

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
<div class="container">
 <div class="row">
    <div class="col-md-6">

          <div class="form-group">
              <label for="Name_cour">Titre : {{ $coure->Name_cour}}</label>
              
          </div>
          <div class="form-group">
              <label for="">Nom de prof <a href="{{ route('user',$coure->user->id) }}"> :{{ $coure->Name_prof}} </a></label>
              </div>
          <div class="form-group">
              <label for="Name_brache">Name_brache : {{ $coure->Name_brache}}</label>
              
          </div>
          
          <div class="form-group">
              <label for="Detail_cour"> Detail  cour: {{ $coure->Detail_cour}}</label>
            
          </div>
          <div class="form-group">
              <label for="Ecole_name">Ecole_name : {{ $coure->Ecole_name}}</label>

          </div>
          <div class="form-group">
              <label for="Ecole_email">Ecole_email : {{ $coure->Ecole_email}}</label>
             
          </div>
          
          
          <div class="form-group">
              <label for="">domain : {{ $coure->Name_domaine}}</label>
             
          </div>
        
         
         
          <a class="btn btn-primary" href="{{ route('cours.index')}}">canel</a> 
          <a href="{{ route('afficher-file', ['id' => $coure->id]) }}" target="_blank" class="btn btn-primary">Afficher le fichier {{ $coure->id }}</a>
         <br>
         <a href="{{ route('commantaire', ['id' => $coure->id]) }}"  >Afficher le commantaire {{ $coure->id }}</a>
         </div>
    <div class="col-md-6">
    <img class="card-img-top" src="{{ url('images/livre_logo.jpg')}}" style="height: 350px; width: 240px;" alt="Card image cap">

      <table>
        <tr>

          <td> <form action="{{ route('download',substr($coure->Path_file ,9)) }}">
             <button type="submit">Download File</button>
           </form></td>
           @guest
    <!-- Code pour les utilisateurs invités -->
         @else
          @if (Route::has('login'))
           @php
            $currentUser = auth()->user();
            $courseUser = $coure->user()->first();
          @endphp

         @if (($currentUser && $courseUser && $currentUser->id === $courseUser->id) || ($currentUser && $currentUser->role == 1))
            <td>
                <form action="{{ route('cours.destroy', $coure->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>

            <td>
                <a href="{{ route('cours.edit', $coure->id)}}" class="btn btn-primary">Modifier</a>
            </td>
        @endif
    @endif
@endguest
        </tr>
      </table>
     
     </div>
  </div>
</div>
            
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
</div>
@endsection