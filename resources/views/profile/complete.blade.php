@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('admin.dashboard.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="my-3 d-flex justify-content-between align-items-center">
                <h2>Completa il tuo profilo</h2>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-warning">Torna alla dashboard</a>
            </div>

            {{-- Github --}}
            <div class="mb-4 row">
                <label for="github" class="col-md-4 col-form-label text-md-right">{{ __('Github') }}</label>

                <div class="col-md-6">
                    <input id="github" type="text" class="form-control" name="github"
                        value="{{ old('github', $user->github) }}">

                </div>
            </div>
            {{-- End  Github --}}

            {{-- Photo --}}
            <div class="mb-4 row">
                <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                <div class="col-md-6">
                    <input id="photo" type="file" class="form-control" name="photo"
                        value="{{ old('photo', $user->photo) }}">
                </div>
            </div>
            {{-- End Photo --}}

            {{-- Phone --}}
            <div class="mb-4 row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control" name="phone"
                        value="{{ old('phone', $user->phone) }}">
                </div>
            </div>
            {{-- End Phone --}}

            {{-- Description --}}
            <div class="mb-4 row">
                <label for="desrcription" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <textarea name="description" id="description"rows="10">{{ $user->description }}</textarea>
                </div>
            </div>
            {{-- End Description --}}

            {{-- Skills --}}
            <div class="mb-4 row">
                <label for="skills" class="col-md-4 col-form-label text-md-right">{{ __('Skills') }}</label>

                <div class="col-md-6">
                    <textarea name="skills" id="skills">{{ $user->skills }}</textarea>
                </div>
            </div>
            {{-- End Skills --}}

            {{-- Button --}}
            <div class="mb-4 row mb-0">
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection