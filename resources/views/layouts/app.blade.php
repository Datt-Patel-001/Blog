<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  
        <!--These jQuery libraries for chosen  need to be included-->
        <script src= "https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" /> 
  
        <!--These jQuery libraries for select2 need to be included-->
        <script src= "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script> 
        <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" /> 

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    <script> 
        $(document).ready(function () { 
            var $prog = $(".select2").select2(); 
            $(".Front-end").on("click", function () { 
                $prog.val().trigger("change"); 
            }); 

            $(".select-all").on("click", function (e) {
                e.preventDefault()
                var allValues = [];
                $prog.find('option').each(function () {
                    allValues.push($(this).val());
                });
                $prog.val(allValues).trigger("change");
            });

            // Remove All button functionality
            $(".remove-all").on("click", function (e) {
                e.preventDefault();
                $prog.val(null).trigger("change");
            });
        });         
    </script>
</html>
