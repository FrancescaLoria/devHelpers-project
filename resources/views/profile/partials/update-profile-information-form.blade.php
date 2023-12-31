<section>
    <header>
        <h2 class="text-secondary">
            {{ __('Informazioni del profilo') }}
        </h2>

        {{-- <p class="mt-1 text-muted">
            {{ __("Update your account's profile information and email address.") }}
        </p> --}}
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('admin.profile.update', $user) }}" class="mt-6 space-y-6"
        enctype="multipart/form-data">
        @csrf
        @method('patch')

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>
        @endif

        <div class="mb-2">
            <label for="name">{{ __('Nome') }}</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name"
                autocomplete="name" value="{{ old('name', $user->name) }}" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="surname">{{ __('Cognome') }}</label>
            <input class="form-control @error('surname') is-invalid @enderror" type="text" name="surname"
                id="surname" autocomplete="surname" value="{{ old('surname', $user->surname) }}" autofocus>
            @error('surname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="address">{{ __('Indirizzo') }}</label>
            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address"
                id="address" autocomplete="address" value="{{ old('address', $user->address) }}" autofocus>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="github">{{ __('GitHub') }}</label>
            <input class="form-control" type="text" name="github" id="github"
                value="{{ old('github', $user->github) }}" autofocus>
        </div>


        <div class="mb-2">
            <label for="photo" class="form-label">immagine</label>
            <input type="file" class="form-control" id="photo" name="photo">

            @if ($user->photo)
                <div>
                    <img width="300" src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->photo }}">
                </div>
            @endif
        </div>

        <div class="mb-2">
            <label for="phone">{{ __('Cellulare') }}</label>
            <input class="form-control" type="text" name="phone" id="phone"
                value="{{ old('phone', $user->phone) }}" autofocus autocomplete="phone">
        </div>

        <div class="mb-2">
            <label for="description">{{ __('Descrizione') }}</label>
            <input class="form-control" type="text" name="description" id="description"
                value="{{ old('description', $user->description) }}" autofocus>
        </div>

        <div class="mb-2">
            <label for="skills">{{ __('Specializzazione') }}</label>
            <input class="form-control" type="text" name="skills" id="skills" autocomplete="skills"
                value="{{ old('skills', $user->skills) }}" autofocus>
        </div>

        <div class="mb-2">
            <label for="email">
                {{ __('Email') }}
            </label>

            <input id="email" name="email" type="email"
                class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"
                autocomplete="username" />

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="my-3">
                <span class="mb-3">Competenze</span>
                @foreach ($technologies as $tech)
                    <div class="form-check">
                        <input class="form-check-input @error('techs') is-invalid @enderror" name="techs[]"
                            type="checkbox" value="{{ $tech->id }}" id="tech-{{ $tech->id }}"
                            @checked(old('techs') ? in_array($tech->id, old('techs', [])) : $user->technologies->contains($tech))>
                        <label class="form-check-label" for="tech-{{ $tech->id }}">
                            {{ $tech->name }}
                        </label>
                    </div>
                @endforeach

                @error('techs')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-muted">
                        {{ __('Il tuo indirizzo email non è verificato.') }}

                        <button form="send-verification" class="btn btn-outline-dark">
                            {{ __('clicca qui per reinviare un email di verifica.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            {{ __('Un nuovo link di verifica è stato inviato al tuo indirizzo email.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-4">
            <button class="btn btn-primary" type="submit">{{ __('Salva') }}</button>

            @if (session('status') === 'profile-updated')
                <script>
                    const show = true;
                    setTimeout(() => show = false, 2000)
                    const el = document.getElementById('profile-status')
                    if (show) {
                        el.style.display = 'block';
                    }
                </script>
                <p id='profile-status' class="fs-5 text-muted">{{ __('Salvato.') }}</p>
            @endif
        </div>
    </form>
</section>
