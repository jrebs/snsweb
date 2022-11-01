<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div class="row">
            <div class="two columns">
                <label for="name">{{ __('Name') }}</label>
            </div>
            <div class="four columns">
                <input id="name" type="text" class="u-full-width" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </div>
        </div>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="row">
            <div class="two columns">
                <label for="email">{{ __('E-Mail Address') }}</label>
            </div>
            <div class="four columns">
                <input id="email" type="email" class="u-full-width" name="email" value="{{ old('email') }}" required autocomplete="email">
            </div>
        </div>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="row">
            <div class="two columns">
                <label for="password">{{ __('Password') }}</label>
            </div>
            <div class="four columns">
                <input id="password" type="password" class="u-full-width" name="password" required autocomplete="new-password">
            </div>
        </div>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="row">
            <div class="two columns">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
            </div>
            <div class="four columns">
                <input id="password-confirm" type="password" class="u-full-width" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="row">
            <div class="six columns">
                <button class="u-full-width button-primary" type="submit" name="submit">Register</button>
            </div>
        </div>
    </form>
</x-app-layout>
