@extends('layouts.admin')

@section('content')
<h1>Recensioni</h1>
@if ($messages === '')
    <h3>non ci sono recensioni</h3>
@else

@foreach ($messages as $message)    
<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"> {{$message->name}} {{$message->surname}}</h5>
      <h6 class="card-subtitle mb-2 text-body-secondary"> {{$message->email}} </h6>
      <p class="card-text">{{ $message->request }}</p>
    </div>
</div>
@endforeach

@endif


    
@endsection