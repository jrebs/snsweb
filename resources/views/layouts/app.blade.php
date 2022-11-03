<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Don't send referrers on links from the app
        -------------------------------------------------- -->
        <meta name="referrer" content="no-referrer">

        <!-- Mobile Specific Metas
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Application Font -->
        <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
        <!-- Hamburger menu font -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="/images/favicon.png">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css"/>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/snsweb.js"></script>
    </head>
    <body>
        <!-- Primary Page Layout -->
        <div class="container">
            <div class="row">
                <div class="twelve columns">

                    @include('layouts.navigation')

                    <!-- Page Heading -->
                    @if (isset($header))
                        <header class="bg-white shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                    {{ $header }}
                                </h2>

                            </div>
                        </header>
                    @endif

                    <div id="alerts" class="row" style="padding: 10px;">
                        @if (session('status'))
                            <div class="row status-message">
                                <div role="alert" class="u-pull-left">{{ session('status') }}</div>
                                <a href="#" class="button u-pull-right" onClick="$(this).parent().remove();">Dismiss</a>
                            </div>
                        @endif

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="row error-message">
                                    <div role="alert" class="u-pull-left">{{ $error }}</div>
                                    <a href="#" class="button u-pull-right" onClick="$(this).parent().remove();">Dismiss</a>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    {{-- Kick it over to the main page template --}}
                    <div class="row" style="padding: 10px;">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
