@extends('layouts.admin')

@section('content')

    <div class="container m-4 ">
        <div class="d-flex justify-content-center">


            <div class="left-side w-50 bkg-light p-3 rounded me-2">
                <h2>{{ $user->name }} {{ $user->surname }}</h2>
                <h6> {{ $user->email }}</h6>
                <p><span class="fw-semibold">Indirizzo:</span> {{ $user->address }}</p>
                <p>
                    <span class="fw-semibold">Github:</span>
                    @if ($user->github)
                        <span>{{ $user->github }}</span>
                    @else
                        <span>GitHub non presente</span>
                    @endif
                </p>
                <p>
                    <span class="fw-semibold">Cellulare:</span>
                    
                    @if ($user->phone)
                        <span>{{ $user->phone }}</span>
                    @else
                        <span>Cellulare non presente</span>
                    @endif
                </p>
                <p>
                    <span class="fw-semibold">Specializzazione:</span>
                    
                    @if ($user->skills)
                        <span>{{ $user->skills }}</span>
                    @else
                        <span>Nessuna specializzazione presente</span>
                    @endif
                </p>
                <p>
                    <span class="fw-semibold">Descrizione:</span>
                    
                    @if ($user->description)
                        <span>{{ $user->description }}</span>
                    @else
                        <span>Nessuna descrizione presente</span>
                    @endif
                </p>
                
                <div class="mt-4">
                    <h4>Competenze</h4>
                    @foreach ($user->technologies as $technology)
                        <span>{{ $technology->name }} {{ $loop->last ? '' : ',' }}</span>
                    @endforeach
                </div>
            </div>
            <div class="right-side w-50">
                <div class="developer-image d-flex justify-content-center pb-4">
                    @if ($user->photo)
                        <img width="200" src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}">
                    @else
                        <div class="w-50 p-5 bg-secondary text-white">
                            <p>Immagine non presente :(</p>
                        </div>
                    @endif
                </div>

                <div class="complete-section text-center p-4 border border-light rounded">
                    
                    @if (!$user->github || !$user->description || !$user->photo || !$user->skills || !$user->phone)
                    <h6>Vuoi raggiungere piú clienti??</h6>
                    <h6>Finisci di completare il tuo profilo</h6>
                    <a href="{{ route('admin.dashboard.edit') }}" class="btn btn-warning">
                        Completa il tuo profilo
                    </a>

                </div>
            </div>
    
    
    
        </div>
        <div class="mt-4">

            <a href="{{ route('admin.profile.edit') }}" class="btn btn-dark me-2">
                Modifica
            </a>
        
            {{-- @if (!$user->github || !$user->description || !$user->photo || !$user->skills || !$user->phone)
                <a href="{{ route('admin.dashboard.edit') }}" class="btn btn-warning">
                    Completa il tuo profilo
                </a> --}}
        </div>
        </div>
       


    @endif
@endsection
