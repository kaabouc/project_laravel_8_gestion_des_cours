@extends('layouts.app')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Modifier le cours
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

      <form method="post" action="{{ route('cours.update', $coure->id ) }}"  enctype="multipart/form-data">
         @csrf
          @method('PUT')
          <div class="form-group">
              <label for="Name_cour">Titre :</label>
              <input type="text" class="form-control" name="Name_cour"  value="{{ $coure->Name_cour}}"/>
          </div>
          <div class="form-group">
              <label for="">Nom de prof </label>
              <input type="text" class="form-control" name="Name_prof"  value="{{ $coure->Name_prof}}"/>
          </div>
          <div class="form-group">
              <label for="Name_brache">Name_brache :</label>
              <input type="text" class="form-control" name="Name_brache" value="{{ $coure->Name_brache}}"/>
          </div>
          
          <div class="form-group">
              <label for="Detail_cour"> Detail  cour: </label>
              <input type="text" class="form-control" name="Detail_cour" value="{{ $coure->Detail_cour}}"/>
          </div>
          <div class="form-group">
              <label for="Ecole_name">Ecole_name :</label>
              <input type="text" class="form-control" name="Ecole_name" value="{{ $coure->Ecole_name}}"/>
          </div>
          <div class="form-group">
              <label for="Ecole_email">Ecole_email :</label>
              <input type="text" class="form-control" name="Ecole_email" value="{{ $coure->Ecole_email}}"/>
          </div>
          
          
          <div class="form-group">
              <label for="">domain :</label>
              <input type="text" class="form-control" name="Name_domaine" value="{{ $coure->Name_domaine}}"/>
          </div>
          

       
        
          <div class="form-group">
              <label for="Path_file">file :</label>
              <input type="file" class="form-control" name="Path_file" value="{{ $coure->Path_file }}"/>
          
          </div>
          <button type="submit" class="btn btn-primary">Modifier</button>
          <a class="btn btn-primary" href="{{ route('cours.show',$coure->id)}}">canel</a>
      </form>
  </div>
</div>
@endsection