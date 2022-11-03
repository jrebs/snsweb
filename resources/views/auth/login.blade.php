<x-app-layout>
    <x-slot name="header">
        {{ __('Login') }}
    </x-slot>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row">
            <div class="one-half column">
                <input type="email" id="email" name="email" class="u-full-width" value="{{ old('email') }}" autocomplete="email" required placeholder="E-mail Address"/>
            </div>
            <div class="one-half column">
                <input type="password" id="password" name="password" class="u-full-width" required autocomplete="current-password" placeholder="Password"/>
            </div>
        </div>

        {{-- <div class="row">
            <div class="u-pull-left">
                <input type="checkbox" name="remember" id="remember" value="{{ old('remember') }}"/>&nbsp;
            </div>
            <div class="u-pull-left">
                <label for="remember">{{ __('Remember Me') }}</label>
            </div>
        </div> --}}
        <div class="u-cf"></div>

        <div class="row">
            <div class="six columns">
                <button class="button-primary u-full-width" type="submit" name="submit">{{ __('Login') }}</button>
            </div>
            <div class="six columns">
                @if (Route::has('password.request'))
                    <a class="button u-full-width" href="{{ route('password.request') }}">{{  __('Forgot Your Password?') }}</a>
                @endif
            </div>
        </div>
    </form>
</x-app-layout>
