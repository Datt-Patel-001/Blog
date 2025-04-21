<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield("title", "Dashboard") </title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/admin/images/logos/favicon.png') }} " />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/styles.min.css') }}" />

    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  
    <!--These jQuery libraries for chosen  need to be included-->
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />

    <!--These jQuery libraries for select2 need to be included-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('admin.partials.sidebar')
        <!--  Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('admin.partials.header')
            <!--  Header End -->

            @yield('content')

            <!--  Footer Start -->
            @include('admin.partials.footer')
            <!--  Footer End -->
        </div>
    </div>

     <script>
        $(document).ready(function() {
            var $prog = $(".select2").select2();
            $(".Front-end").on("click", function() {
                $prog.val().trigger("change");
            });

            $(".select-all").on("click", function(e) {
                e.preventDefault()
                var allValues = [];
                $prog.find('option').each(function() {
                    allValues.push($(this).val());
                });
                $prog.val(allValues).trigger("change");
            });

            // Remove All button functionality
            $(".remove-all").on("click", function(e) {
                e.preventDefault();
                $prog.val(null).trigger("change");
            });
        });

    </script>
    @yield('scripts')
    <script src="{{ asset('assets/admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
</body>
</html>