@extends('layouts.app')

@section('content')
<div class="container bkg-index">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Pannello di controllo') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Pannello utente') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Accesso eseguito!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
