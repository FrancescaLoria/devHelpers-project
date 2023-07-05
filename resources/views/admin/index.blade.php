@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ $user->name }} {{ $user->surname }}</h1>
        <h6>Email: {{ $user->email }}</h6>
        <p>Address: {{ $user->address }}</p>
        <p>
            Github:
            @if ($user->github)
                <span>{{ $user->github }}</span>
            @else
                <span>No github profile avalaible</span>
            @endif
        </p>
        <p>
            Phone:
            @if ($user->phone)
                <span>{{ $user->phone }}</span>
            @else
                <span>No phone number avalaible</span>
            @endif
        </p>
        <p>
            Skills:
            @if ($user->skills)
                <span>{{ $user->skills }}</span>
            @else
                <span>No skills avalaible</span>
            @endif
        </p>
        <p>
            Description:
            @if ($user->description)
                <span>{{ $user->description }}</span>
            @else
                <span>No description avalaible</span>
            @endif
        </p>
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
            <h4>Technologies</h4>
            @foreach ($user->technologies as $technology)
                <span>{{ $technology->name }} {{ $loop->last ? '' : ',' }}</span>
            @endforeach
        </div>
    </div>

    <a href="{{ route('admin.profile.edit') }}" class="btn btn-info m-1">
        Edit
    </a>

    <a href="{{ route('admin.dashboard.edit') }}" class="btn btn-warning m-1">
        Completa il tuo profilo
    </a>
@endsection
