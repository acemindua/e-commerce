<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      
      <title>Admin | {{ ($breadcrumb = Breadcrumbs::current()) ? $breadcrumb->title : config('app.name', 'Laravel') }}</title>
      
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      @stack('styles')

      <!-- Styles -->
      <link href="{{ mix('css/admin/admin.css') }}" rel="stylesheet">

      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

      <!-- Scripts -->
      <script src="{{ mix('js/admin/admin.js') }}" defer></script>

   </head>
   <body>
      <div id="app">

         <x-admin.header />

         <div class="container-fluid">
            <div class="row flex-nowrap">

               <x-admin.navbar />

               <main class="col">
                     
                  <div class="container">

                     <div class="d-flex justify-content-between mt-4 mb-3">
                        <h1 class="fs-3 text-muted">{{ ($breadcrumb = Breadcrumbs::current()) ? $breadcrumb->title : '' }}</h1>

                        {{ Breadcrumbs::render() }}
                     </div>

                     @yield('content')
                  </div>     

               </main>

            </div>
         </div>
         
         <!-- Scripts -->
         @stack('javascripts')

      </div>
   </body>
</html>