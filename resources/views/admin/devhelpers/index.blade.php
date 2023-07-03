@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ $user->name }} {{ $user->surname }}</h1>
        <h6>Email: {{ $user->email }}</h6>
        <p>indirizzo: {{ $user->address }}</p>
        <p>github: {{ $user->github }}</p>
        <p>cellulare: {{ $user->phone }}</p>
        <p>Skills: {{ $user->skills }}</p>
        <div class="developer-image my-3">
            @if ($user->photo)
                <img width="300" src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}">
            @else
                <div class="w-25 p-5 bg-secondary text-white">
                    No image :(
                </div>
            @endif
        </div>
        <div class="mt-4">
            <h4>Tecnologie</h4>
            @forelse ($user->technologies as $technology)
                <span>{{ $technology->name }} {{ $loop->last ? '' : ',' }}</span>
            @empty
                <span>Nessuna tecnologia inserita</span>
            @endforelse
        </div>
    </div>
@endsection
