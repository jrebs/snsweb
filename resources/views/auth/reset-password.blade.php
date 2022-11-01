<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reset Password') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="row">
            <div class="two columns">
                <label for="email">{{ __('E-Mail Address') }}</label>
            </div>
            <div class="four columns">
                <input id="email" type="email" class="u-full-width" name="email" value="{{ $request->input('email') ?? old('email') }}" required autocomplete="email" autofocus>
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
                <label for="password_confirm">{{ __('Confirm Password') }}</label>
            </div>
            <div class="four columns">
                <input id="password-confirm" type="password" class="u-full-width" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="row">
            <div class="six columns">
                <button type="submit" class="button-primary u-full-width">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
</x-app-layout>
