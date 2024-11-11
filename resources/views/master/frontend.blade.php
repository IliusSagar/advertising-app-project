<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php 
        $home_page = DB::table('home_pages')->first();
    @endphp

    <link rel="icon" type="image/x-icon" href="{{ url($home_page->favicon)}}">
    <meta name="url" content="{{ url()->current() }}">

    <title>{{ $home_page->title }}</title>

    <!-- bootstrap cdn css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- google font cdn  -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- font awesome cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <style>
        body {
            font-family: "Roboto", sans-serif;
            font-weight: 300;
            background: linear-gradient(350deg, #f4f9ff, #edf4ffc9);
        }

        hr {
            border-top: 0px solid black !important;
            padding: 0;
            margin-top: 0.5em !important;
            border-width: 3px !important;
            width: 145px;
        }
    </style>

</head>

<body>

    <!-- Start Navbar Section -->
    @include('frontend.layouts.navbar')
    <!-- End Navbar Section -->

    @yield('content')

    <!-- Start Footer Section  -->
    @include('frontend.layouts.footer')
    <!-- End Footer Section  -->

    <!-- Start Copywrite Section  -->
    @include('frontend.layouts.copywrite')
    <!-- End Copywrite Section  -->

    <!-- bootstrap cdn js  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @if(Session::has('success'))
    <script>
        toastr.success("{{ session("success") }}");
    </script>
    @endif

    @if(Session::has('error'))
    <script>
        toastr.error("{{ session("error") }}");
    </script>
    @endif
</body>

</html>