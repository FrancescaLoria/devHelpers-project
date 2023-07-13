@extends('layouts.admin')

@section('content')
<h1>Recensioni</h1>
@if ($reviews === [])
    <h3>non ci sono recensioni</h3>
@else

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Voto</th>
      <th scope="col">Recensione</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($reviews as $review)    
      <tr>
        <td> {{$review->name}} </td>
        <td> {{$review->vote}} </td>
        <td> {{$review->comment}} </td>
        <td> {{$review->created_at}} </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endif


    
@endsection