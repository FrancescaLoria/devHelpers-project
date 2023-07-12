@extends('layouts.app')
@section('content')

<div class="container bkg-index pt-4 pb-4">
    <h2 class="fs-4 pb-3 ">
        {{ __('Aggiorna il tuo profilo') }}
    </h2>
    <div class="card p-4 mb-4 bkg-index">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card p-4 mb-4 bkg-index">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card p-4 mb-4 bkg-index">


        @include('profile.partials.delete-user-form')

    </div>
</div>

@endsection
