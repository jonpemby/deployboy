<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Permanent+Marker" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <main id="app" class="site-content">
        @unless($omit_nav)
            @include('components.header')
        @endunless

        @hasSection('before-main')
        <section class="before-main">
            @yield('before-main')
        </section>
        @endif

        <section class="main container mx-auto py-4
              @hasSection('sidebar')
              with-sidebar
              @endif">
            @hasSection('sidebar')
            <aside class="sidebar">
                @yield('sidebar')
            </aside>
            @endif

            <article class="content">
                @yield('content')
            </article>
        </section>

        @hasSection('after-main')
        <section class="after-main">
            @yield('after-main')
        </section>
        @endif

        @unless($omit_footer)
            @include('components.footer')
        @endunless
    </main>
</body>
</html>
