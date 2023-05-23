
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

      <form method="post" action="{{ route('commantaire.store') }}"    enctype="multipart/form-data" >
               @csrf
          <div class="form-group"> 
              <label for="Name">name  :</label>
              <input type="text" class="form-control" name="Name" value="{{ old('Name')}}"/>
          </div>
          <div class="form-group">
              <label for="Email">Email </label>
              <input type="text" class="form-control" name="Email"  value="{{ old('Email')}}"/>
          </div>
          <div class="form-group">
              <label for="Detail_comm">Detail commantaire :</label>
              <input type="text" class="form-control" name="Detail_comm" value="{{ old('Detail_comm')}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
  </div>
</div>
@endsection