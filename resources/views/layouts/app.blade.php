<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('meta')

        <title>@yield('title')</title>

        {{-- Styles --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @stack('styles')
    </head>
    <body class="d-flex flex-column">
        <nav class="navbar fixed-top navbar-expand-lg">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <a class="navbar-brand" href="{{ route('view.index') }}">Laravel Template</a>
                    <ul class="navbar-nav">
                        <li class="nav-item @if (Request::is('/test/*')) active @endif">
                            <a class="nav-link" href="#">Link 1</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            @yield('content')
        </div>

        <footer>
            <div class="container text-center">
                Laravel Template
            </div>
        </footer>

        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}"></script>

        @stack('scripts')
    </body>
</html>
