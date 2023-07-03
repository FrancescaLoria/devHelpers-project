<section>
    <header>
        <h2 class="text-secondary">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mb-2">
            <label for="name">{{__('Name')}}</label>
            <input class="form-control" type="text" name="name" id="name" autocomplete="name" value="{{old('name', $user->name)}}" required autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->get('name')}}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="surname">{{__('Surname')}}</label>
            <input class="form-control" type="text" name="surname" id="surname" autocomplete="surname" value="{{old('surname', $user->surname)}}" required autofocus>
        </div>

        <div class="mb-2">
            <label for="address">{{__('Address')}}</label>
            <input class="form-control" type="text" name="address" id="address" autocomplete="address" value="{{old('address', $user->address)}}" required autofocus>
        </div>

        <div class="mb-2">
            <label for="github">{{__('GitHub')}}</label>
            <input class="form-control" type="text" name="github" id="github" value="{{old('github', $user->github)}}"  autofocus>
        </div>

        <div class="mb-2">
            <label for="photo">{{__('Photo')}}</label>
            <input class="form-control" type="text" name="photo" id="photo" value="{{old('photo', $user->photo)}}" autofocus>
        </div>

        <div class="mb-2">
            <label for="phone">{{__('Phone')}}</label>
            <input class="form-control" type="text" name="phone" id="phone" value="{{old('phone', $user->phone)}}" autofocus autocomplete="phone">
        </div>

        <div class="mb-2">
            <label for="description">{{__('Description')}}</label>
            <input class="form-control" type="text" name="description" id="description" value="{{old('description', $user->description)}}" autofocus>
        </div>

        <div class="mb-2">
            <label for="skills">{{__('Skills')}}</label>
            <input class="form-control" type="text" name="skills" id="skills" autocomplete="skills" value="{{old('skills', $user->skills)}}" required autofocus>
        </div>

        <div class="mb-2">
            <label for="email">
                {{__('Email') }}
            </label>

            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email)}}" required autocomplete="username" />

            @error('email')
            <span class="alert alert-danger mt-2" role="alert">
                <strong>{{ $errors->get('email')}}</strong>
            </span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-muted">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="btn btn-outline-dark">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 text-success">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-4">
            <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
            <script>
                const show = true;
                setTimeout(() => show = false, 2000)
                const el = document.getElementById('profile-status')
                if (show) {
                    el.style.display = 'block';
                }
            </script>
            <p id='profile-status' class="fs-5 text-muted">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
