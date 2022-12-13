<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!--  Custom Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <!-- Animate Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('/frontend/css/style.css')}}" />
    <!-- Autocomplete jquery -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    {{--
    <link rel="stylesheet" href="/resources/demos/style.css"> --}}
</head>

<body id="up" class="d-flex flex-column justify-content-between min-vh-100">
    <!--------- Start of Sidebar ----------->
    @include('frontend.layouts.sidebar')
    <!--------- Start of Navbar ----------->
    @include('frontend.layouts.navbar',['brands'=> $brands ])
    @if (request()->is('/'))
    <!----------- Start Carousel Section ----------->
    @include('frontend.layouts.carousel',['products'=>$products])
    <!----------- Strat of Welcome ----------->
    @include('frontend.layouts.welcome')
    @endif
    <!--------- Home Section ----------->
    @yield('content')
    @if (request()->is('/'))
    <!--------- Brand Logo ----------->
    @include('frontend.layouts.brand_logo')
    @endif
    <!--------- Footer Section ----------->
    @include('frontend.layouts.footer')
    <!-- Link to JQuery 3.6.0 cdn js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Boostrp 4 cdn js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom Js -->
    <script src="{{asset('/frontend/js/app.js')}}"></script>
    <!-- Autocomplete jquery -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    @yield('scripts')
    <script>
        var availableTags = [];
        $.ajax({
            type: "GET",
            url: "/auto-complete",
            success: function (response) {
                startComplete(response);
                startCompleteTwo(response);
            }
        });
        function startComplete(availableTags){
            $( "#brand_search" ).autocomplete({
        source: availableTags
            });
        }

        function startCompleteTwo(availableTags){
            $( "#brand_mini_search" ).autocomplete({
        source: availableTags
            });
        }
    </script>
    </script>
</body>

</html>