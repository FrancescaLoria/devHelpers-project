@extends('layouts.admin')

@section('content')

    <div class="container m-4 ">
        <div class="d-flex justify-content-center">


            <div class="left-side w-50 bkg-light p-3 rounded me-2">
                <h1>{{ $user->name }} {{ $user->surname }}</h1>
                <h6>Email: {{ $user->email }}</h6>
                <p>Indirizzo: {{ $user->address }}</p>
                <p>
                    Github:
                    @if ($user->github)
                        <span>{{ $user->github }}</span>
                    @else
                        <span>GitHub non presente</span>
                    @endif
                </p>
                <p>
                    Cellulare:
                    @if ($user->phone)
                        <span>{{ $user->phone }}</span>
                    @else
                        <span>Cellulare non presente</span>
                    @endif
                </p>
                <p>
                    Specializzazione:
                    @if ($user->skills)
                        <span>{{ $user->skills }}</span>
                    @else
                        <span>Nessuna Specializzazione presente</span>
                    @endif
                </p>
                <p>
                    Descrizione:
                    @if ($user->description)
                        <span>{{ $user->description }}</span>
                    @else
                        <span>Non è presente una descrizione</span>
                    @endif
                </p>
                
                <div class="mt-4">
                    <h4>Competenze</h4>
                    @foreach ($user->technologies as $technology)
                        <span>{{ $technology->name }} {{ $loop->last ? '' : ',' }}</span>
                    @endforeach
                </div>
            </div>
            <div class="right-side w-50 rounded">
                <div class="developer-image d-flex justify-content-center">
                    @if ($user->photo)
                        <img width="200" src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}">
                    @else
                        <div class="w-25 p-5 bg-secondary text-white">
                            immagine non presente :(
                        </div>
                    @endif
                </div>
            </div>
    
    
    
        </div>
        <div class="mt-4">

            <a href="{{ route('admin.profile.edit') }}" class="btn btn-dark me-2">
                MOdifica
            </a>
        
            @if (!$user->github || !$user->description || !$user->photo || !$user->skills || !$user->phone)
                <a href="{{ route('admin.dashboard.edit') }}" class="btn btn-warning">
                    Completa il tuo profilo
                </a>
        </div>
        </div>
       


    @endif
@endsection
