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
  <!-- <a href="{{ route('users.create')}}" class="btn btn-primary">Ajouter</a> -->

  <table class="table table-striped">
  <thead>
        <tr>
          <td>ID</td>
          <td>NOM user </td>
          <td>EMAIL </td>
          <td colspan="3">opperation</td>
        </tr>
    </thead>

<div class="row">
  
@foreach($users  as $item)
<tr>
            <td>{{$item->id}} </td>
            <td>{{$item->name}} <br > <a style=" color : red ;"></a> </br> </td>
            <td>{{$item->email}}</td>
            
        
             
            <td><a href="{{ route('cours.edit', $item->id)}}" class="btn btn-primary">Modifier</a></td>
            <td><a href="{{ route('cours.show', $item->id)}}" class="btn btn-primary">detail</a></td>
            <td>
                <form action="{{ route('cours.destroy', $item->id)}}" method="post">
                  @csrf
                @method('DELETE')
                 <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>

  
</div>

  
  <div>
    @endsection