@extends('layouts.admin')

@section('content')
<h1>Messaggi</h1>
@if ($messages === '')
    <h3>non ci sono recensioni</h3>
@else

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">messaggio</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($messages as $message)    
      <tr>
        <td> {{$message->name}} </td>
        <td> {{$message->email}} </td>
        <td> {{$message->request}} </td>
        <td> {{$message->created_at}} </td>
      </tr>
    @endforeach
  </tbody>
</table>


@endif


    
@endsection