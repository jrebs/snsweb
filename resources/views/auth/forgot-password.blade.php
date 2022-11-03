<x-app-layout>
    <x-slot name="header">
        {{ __('Forgot Password') }}
    </x-slot>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="row">
            <div class="one-half column">
                <input id="email" type="email" class="u-full-width" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
            </div>
            <div class="one-half column"></div>
        </div>
        <div class="row">
            <div class="one-half column">
                <button type="submit" class="u-full-width button-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
            <div class="one-half column"></div>
        </div>
    </form>
</x-app-layout>
