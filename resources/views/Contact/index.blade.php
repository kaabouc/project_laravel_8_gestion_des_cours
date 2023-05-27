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
        <tr style="font-size: 20px; color: brown;">
          <td>ID</td>
          <td>Name de perssone </td>
          <td>email de personne  </td>
          <td>subject</td>
          <td colspan="3">Message  </td>
         
        </tr>
    </thead>

    <tbody>
    
  
        @foreach($contact as $item)
       
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->Name}}</td>
            <td>{{$item->Email}}</td>
            <td>{{$item->Subject}}</td>
            <td colspan="3">{{$item->Message}}</td>

          
        </tr>
       
     
        @endforeach
    </tbody>
  </table>
<div>
@endsection
