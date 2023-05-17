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
              <label for="">Nom de prof :{{ $coure->Name_prof}} </label>
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
          <div>{{ $coure->Path_file }}</div>
         <img src="{{ asset(substr($coure->Path_file ,9)) }}" />
          <div class="form-group">
              <label for="Path_file">file :{{ $coure->Path_file }} </label>
          </div>
         
          <a class="btn btn-primary" href="{{ route('cours.index')}}">canel</a> 
         <br>
         </div>
    <div class="col-md-6">
    <img class="card-img-top" src="{{ url('images/hihi.jpeg')}}" style="height: 350px; width: 240px;" alt="Card image cap">

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

         @if ($currentUser && $courseUser && $currentUser->id === $courseUser->id)
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
</div>
@endsection