@extends('layouts.admin')

@section('content')
<h1>Recensioni</h1>
@if ($reviews === [])
    <h3>non ci sono recensioni</h3>
@else

@foreach ($reviews as $review)    
<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"> {{$review->name}} </h5>
      <h6 class="card-subtitle mb-2 text-body-secondary"> {{$review->vote}} </h6>
      <p class="card-text">{{ $review->comment }}</p>
    </div>
</div>
@endforeach

@endif


    
@endsection