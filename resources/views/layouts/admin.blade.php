<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/admin/admin.css') }}" rel="stylesheet">

    @stack('styles')

    <!-- Scripts -->
    <script src="{{ mix('js/admin/admin.js') }}" defer></script>

</head>
    <body id="page-top">
        <div id="app">
            <div class="container-fluid">
                <div class="row flex-nowrap">
                    <!-- Page Wrapper -->
                    <div id="wrapper">
                        
                        <x-admin.header />

                        <x-admin.navbar />

                        
                            <main class="col ps-md-2 pt-2">
                                <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="border rounded-3 p-1 text-decoration-none">
                                    <i class="bi bi-list bi-lg py-2 p-1"></i> Menu</a>
                                
                                @yield('content')

                            </main>
                    
                        
                    </div><!-- /Page Wrapper -->
                </div>
            </div>

            <!-- Scripts -->
            @stack('javascripts')
        </div>
    </body>
</html>
