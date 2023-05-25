<!-- index.blade.php -->

@extends('layouts.app')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="uper">


@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif  
    @if (Session::has('cour_id'))
   {{   Session('cour_id') }}
   
      <a  class="btn btn-primary"> test de  </a> 
    
      @endif

  <table class="table table-striped">

    <thead>
        <tr>
          <td>Name</td>
          <td>email </td>
          <td> detaill </td>
          <td>id cour  </td>
          <td>id user  </td>
          <td colspan="2"> operation  </td>
        </tr>
    </thead>

    <tbody>
   
        @foreach($commantaire as $item) 
        <tr>
        
            <td>{{$item->Name}}</td>
          
            <td>{{$item->Email}}</td>
            <td>{{$item->Detail_comm}}</td>
            <td>{{$item->Cour_id}}</td>
            
            <td>
               {{$item->User_id}}   
            </td>
         
            <td>
            @guest
               @else
          @if (Route::has('login'))
           @php
            $currentUser = auth()->user();
            $courseUser = $item->user()->first();
          @endphp

         @if (($currentUser && $courseUser && $currentUser->id === $courseUser->id) || ($currentUser && $currentUser->role == 1))
                <form action="{{ route('commantaire.destroy', $item->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>

            <td>
                <a href="{{ route('commantaire.edit',$item->id)}}" class="btn btn-primary">Modifier</a>
            </td>
        @endif
    @endif
@endguest

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
              <input type="text" class="form-control" name="Cour_id" value=""  />
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
<div>
@endsection
