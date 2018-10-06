<!DOCTYPE html>
<html lang="{{ config( 'app.locale' ) }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Bootstrap -->
<link href="{{ asset( 'css/app.css' ) }}" rel="stylesheet">
<link href="{{ asset( 'css/app/nav-bar.css' ) }}" rel="stylesheet">
<link rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
  integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
  crossorigin="anonymous">
@yield( 'css' )
<head>
    <title>{{ config( 'app.name' ) }}</title>
</head>
<body class="container-fluid">
    <div class="row">
        @include( 'app.nav-bar' )
    </div>

    <div class="row">

        <div id="main_content" class="col-md-9">
            @include( 'app.error-message' )
            @yield( 'content' )
            @include( 'app.include' )
        </div>

        <div class="col-md-3">
            @auth
                @include( 'app.sidebars.info-bar' )
            @endauth
        </div>
        <script type="text/javascript" src="{{ URL::asset( 'js/app.js' ) }}"></script>
        <script type="text/javascript" src="{{ URL::asset( 'js/app/nav-bar.js' ) }}"></script>
        @yield( 'footer' )
    </div>

</body>
</html>
