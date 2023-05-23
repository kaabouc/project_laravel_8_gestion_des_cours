<!-- index.blade.php -->

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
  

  
  
  <table class="table table-striped">

    <thead>
        <tr>
          <td>ID</td>
          <td>email </td>
          <td> detaill </td>
     
          <td colspan="3">opperation</td>
        </tr>
    </thead>

    <tbody>
   
        @foreach($commantaire as $item) 
        <tr>
            <td>{{$item->Name}}</td>
          
            <td>{{$item->Email}}</td>
            <td>{{$item->Detail_comm}}</td>
            <td>
               {{$item->User_id}}
            </td>
        </tr>
       
     
        @endforeach
    </tbody>
  </table>
  <hr>
    
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
          <div class="form-group">
              <label for="Cour_id"> cour i_d :</label>
              <input type="text" class="form-control" name="Cour_id" value="{{$id}}" />
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
<div>
@endsection
