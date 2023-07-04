@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('admin.dashboard.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h1>Completa profilo</h1>

            {{-- Github --}}
            <div class="mb-4 row">
                <label for="github" class="col-md-4 col-form-label text-md-right">{{ __('github') }}</label>

                <div class="col-md-6">
                    <input id="github" type="text" class="form-control" name="github" value="{{ old('github', $user->github) }}">

                </div>
            </div>
            {{-- End  Github --}}

            {{-- Photo --}}
            <div class="mb-4 row">
                <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('photo') }}</label>

                <div class="col-md-6">
                    <input id="photo" type="file" class="form-control" name="photo" value="{{ old('photo') }}">
                </div>
            </div>
            {{-- End Photo --}}

            {{-- Phone --}}
            <div class="mb-4 row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                </div>
            </div>
            {{-- End Phone --}}

            {{-- Description --}}
            <div class="mb-4 row">
                <label for="desrcription" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

                <div class="col-md-6">
                    <textarea name="description" id="description"rows="10"></textarea>
                </div>
            </div>
            {{-- End Description --}}

            {{-- Skills --}}
            <div class="mb-4 row">
                <label for="skills" class="col-md-4 col-form-label text-md-right">{{ __('skills') }}</label>

                <div class="col-md-6">
                    <textarea name="skills" id="skills"></textarea>
                </div>
            </div>
            {{-- End Skills --}}

            {{-- Button --}}
            <div class="mb-4 row mb-0">
                <div class="text-end mt-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Salva') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection
