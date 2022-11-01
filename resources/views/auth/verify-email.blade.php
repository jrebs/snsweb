<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verify Account') }}
        </h2>
    </x-slot>

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    <div class="row">
        <div class="four columns"></div>
        <div class="four columns">
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="post" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit">
                    {{ __('click here to request another') }}
                </button>
            </form>
        </div>
        <div class="four columns"></div>
    </div>
</x-guest-layout>
