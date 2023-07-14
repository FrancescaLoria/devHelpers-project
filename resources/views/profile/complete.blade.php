@extends('layouts.app')
@section('content')
    <div class="container bkg-index p-4">

        <form method="POST" action="{{ route('admin.dashboard.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class=" d-flex justify-content-between align-items-center pb-4">
                <h2>Completa il tuo profilo</h2>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-warning">Ritorna alla dashboard</a>
            </div>

            {{-- Github --}}
            <div class="mb-4 row">
                @if (!$user->github)
                    <label for="github" class="col-md-4 col-form-label text-md-right">{{ __('Github') }}</label>

                    <div class="col-md-6">
                        <input id="github" type="text" class="form-control" name="github"
                            value="{{ old('github', $user->github) }}">
                    </div>
                @endif
            </div>
            {{-- End  Github --}}

            {{-- Photo --}}
            <div class="mb-4 row">
                @if (!$user->photo)
                    <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Immagine') }}</label>

                    <div class="col-md-6">
                        <input id="photo" type="file" class="form-control" name="photo"
                            value="{{ old('photo', $user->photo) }}">
                    </div>
                @endif
            </div>
            {{-- End Photo --}}

            {{-- Phone --}}
            <div class="mb-4 row">
                @if (!$user->phone)
                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Cellulare') }}</label>

                    <div class="col-md-6">
                        <input id="phone" type="text" class="form-control" name="phone"
                            value="{{ old('phone', $user->phone) }}">
                    </div>
                @endif
            </div>
            {{-- End Phone --}}

            {{-- Description --}}
            <div class="mb-4 row">
                @if (!$user->description)
                    <label for="desrcription" class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}</label>

                    <div class="col-md-6">
                        <textarea class="form-control" name="description" id="description"rows="10">{{ $user->description }}</textarea>
                    </div>
                @endif
            </div>
            {{-- End Description --}}

            {{-- Skills --}}
            <div class="mb-4 row">
                @if (!$user->skills)
                    <label for="skills" class="col-md-4 col-form-label text-md-right">{{ __('Specializzazione') }}</label>

                    <div class="col-md-6">
                        <textarea class="form-control" name="skills" id="skills">{{ $user->skills }}</textarea>
                    </div>
                @endif
            </div>
            {{-- End Skills --}}

            {{-- Button --}}
            <div class="mb-4 row mb-0">
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Salva') }}
                    </button>
                </div>
            </div>
        </form>



    </div>
@endsection
