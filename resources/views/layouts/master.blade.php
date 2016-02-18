<!doctype html>
<html lang = 'en'>
<head>
    <meta charset = 'UTF-8'>
    <title>@yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <link href="{{URL::asset('css/main.css')}}" rel="stylesheet" media="screen, projection">
    <script type="text/javascript" src="{{URL::asset('js/js.js')}}"></script>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}





</head>
{{--//get the session from teh previous page in controller--}}
@if (Session::has('flashKey'))
    <div class = 'alert alert-success'>
        {{--<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden="true">&times;</button>--}}
        {{Session::get('flashKey')}}
    </div>
@endif


<script>
    $('div.alert').delay(3000).slideUp(300);
    //        $("p").fadeOut(2000);
</script>


@yield('index')
<body>

<div class = 'container'>
    <div class = 'col-md-8 col-md-offset-2'>

        @yield('content')
    </div>
</div>

<div class="container">

        @yield('footer')

</div>
</body>
</html>