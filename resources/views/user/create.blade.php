
@extends('layouts.app')

@section('content')
  
  <!-- @if(count($errors))
     <div class="alert alert-danger" role="alert">
       <ul>
    @foreach($$errors->all() as $message)
    <li> {{ $ $message }} </li>
    @endforeach
       </ul>

     </div>
@endif -->


<style>
  .uper {
    margin-top: 40px;
  }
</style>
    
<div class="card uper">
  <div class="card-header">
    Ajouter une livre :
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

      <form method="post" action="{{ route('cours.store') }}"    enctype="multipart/form-data" >
               @csrf
          <div class="form-group">
              <label for="Name_cour">Name_cour :</label>
              <input type="text" class="form-control" name="Name_cour" value="{{ old('Name_cour')}}"/>
          </div>
          <div class="form-group">
              <label for="">Nom de prof </label>
              <input type="text" class="form-control" name="Name_prof"  value="{{ old('Name_prof')}}"/>
          </div>
          <div class="form-group">
              <label for="Name_brache">Name_brache :</label>
              <input type="text" class="form-control" name="Name_brache" value="{{ old('Name_brache')}}"/>
          </div>
          
          <div class="form-group">
              <label for="Detail_cour"> Detail  cour: </label>
              <input type="text" class="form-control" name="Detail_cour" value="{{ old('Detail_cour')}}"/>
          </div>
          <div class="form-group">
              <label for="Ecole_name">Ecole_name :</label>
              <input type="text" class="form-control" name="Ecole_name" value="{{ old('Ecole_name')}}"/>
          </div>
          <div class="form-group">
              <label for="Ecole_email">Ecole_email :</label>
              <input type="text" class="form-control" name="Ecole_email" value="{{ old('Ecole_email')}}"/>
          </div>
          
          
          <div class="form-group">
              <label for="">domain :</label>
              <input type="text" class="form-control" name="Name_domaine" value="{{ old('Name_domaine')}}"/>
          </div>
          

          
        
          <div class="form-group">
              <label for="Path_file">file :</label>
              <input type="file" class="form-control" name="Path_file" value="{{ old('Path_file')}}"/>
          
          </div>
          
          <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
  </div>
</div>
@endsection