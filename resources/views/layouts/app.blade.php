<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-indigo-800 py-4 border-b-2 border-gray-400">
            <div class="container mx-auto flex justify-between items-center">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <a class="no-underline font-semibold border-b-2 border-transparent hover:border-white hover:text-white {{ request()->routeIs('subjectchoice*') ? 'border-white text-white' : '' }}"
                        href="{{ route('subjectchoice.index') }}">{{ __('Subject Choice') }}</a>
                    <a class="no-underline font-semibold border-b-2 border-transparent hover:border-white hover:text-white {{ request()->routeIs('student*') ? 'border-white text-white' : '' }}"
                        href="{{ route('student.index') }}">{{ __('Student') }}</a>
                    <a class="no-underline font-semibold border-b-2 border-transparent hover:border-white hover:text-white {{ request()->routeIs('subject*') && !request()->routeIs('subjectchoice.index') ? 'border-white text-white' : '' }}"
                        href="{{ route('subject.index') }}">{{ __('Subject') }}</a>
                    <a class="no-underline font-semibold border-b-2 border-transparent hover:border-white hover:text-white {{ request()->routeIs('payment*') || request()->routeIs('transaction*') ? 'border-white text-white' : '' }}"
                        href="{{ route('payment.index') }}">{{ __('Payment Records') }}</a>

                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span class="pl-8 text-red-500">{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}" class="no-underline hover:underline"
                            onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        @yield('content')
    </div>
    @livewireScripts
</body>

</html>
