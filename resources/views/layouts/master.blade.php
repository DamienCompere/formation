    <!DOCTYPE html>
    <!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1">
    <title>Post</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            @include('partials.menu')
            </div>
            @include('partials.searchBar')
        </div>
        <div class="row">
            <div class="col-sm-12">
            @yield('content')
            </div>
        </div>
        @include('partials.menu')
    </div>
@section('scripts')
<script src="{{asset('js/app.js')}}"></script>
@show
</body>
</html>