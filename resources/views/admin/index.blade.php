@extends('layouts.admin')

@section('content')
<div class="container">
  <h1>{{$user->name}} {{$user->surname}}</h1>
  <h6>Email: {{$user->email}}</h6>
  <p>indirizzo: {{$user->address}}</p>
  <p>github: {{$user->github}}</p>
  <p>cellulare: {{$user->phone}}</p>
  <p>Skills: {{$user->skills}}</p>
</div>

<a href="{{ route('profile.edit') }}" class="btn btn-info m-1">
  Edit
</a>
@endsection