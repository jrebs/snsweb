<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Login') }}
        </h2>
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="row">
            <div class="one-half column">
                <label for="password">{{ __('Password') }}</label>
            </div>
            <div class="one-half column">
                <input type="password" id="password" name="password" class="u-full-width" value="" required placeholder="password"/>
            </div>
        </div>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="flex justify-end mt-4">
            <button type="submit" class="button-primary u-full-width">
                {{ __('Confirm') }}
            </button>
        </div>
    </form>
</x-app-layout>
