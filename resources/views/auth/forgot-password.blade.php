<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forgot Password') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('password.update') }}">
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
