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
          <td>Name de user </td>
          <td>email de user </td>
          <td>fonction  utilisateur  </td>
          <td colspan="3">opperation</td>
        </tr>
    </thead>

    <tbody>
    
      <a href="{{ route('users.create')}}" class="btn btn-primary">Ajouter</a> 
    
      
  
        @foreach($users as $item)
       
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->fonction_user}}</td>

            <td><a href="{{ route('users.edit', $item->id)}}" class="btn btn-primary">Modifier</a></td>
            <td><a href="{{ route('user',$item->id) }}" class="btn btn-primary">detail</a></td>
            <td>
                <form   action="{{ route('users.destroy', $item->id)}}"method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
       
     
        @endforeach
    </tbody>
  </table>
<div>
@endsection
