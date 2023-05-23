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

      <form method="post" action="{{ route('users.update', $user->id ) }}"  enctype="multipart/form-data">
         @csrf
          @method('PUT')
          <div class="form-group">
              <label for="Name_cour">Name  :</label>
              <input type="text" class="form-control" name="name"  value="{{ $user->name}}"/>
          </div>
          <div class="form-group">
              <label for="">description ustilisateur  </label>
              <input type="text" class="form-control" name="description_user"  value="{{ $user->description_user}}"/>
          </div>
          <div class="form-group">
              <label for="Name_brache">fonction de  user :</label>
              <input type="text" class="form-control" name="fonction_user" value="{{ $user->fonction_user}}"/>
          </div>
          
          <div class="form-group">
              <label for="Detail_cour"> email  : </label>
              <input type="text" class="form-control" name="email" value="{{ $user->email}}"/>
          </div>
        
          
          
          <div class="form-group">
              <label for="">password :</label>
              <input type="text" class="form-control" name="password" value="{{ $user->password}}"/>
          </div>
       
          <div class="form-group">
              <label for="photo_user">file :</label>
              <input type="file" class="form-control" name="photo_user" value="{{ $user->photo_user }}"/>
          
          </div>
          <button type="submit" class="btn btn-primary">Modifier</button>
          <a class="btn btn-primary" href="{{ route('users.index')}}">canel</a>
      </form>
  </div>
</div>
@endsection