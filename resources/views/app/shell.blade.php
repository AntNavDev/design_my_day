<!DOCTYPE html>
<html lang="{{ config( 'app.locale' ) }}">
<!-- Bootstrap -->
<link href="{{ asset( 'css/app.css' ) }}" rel="stylesheet">
@yield( 'css' )
<head>
    <title>{{ config( 'app.name' ) }}</title>
</head>
<body class="container-fluid">
    <div class="row">
        <div id="profile_sidebar" class="col-md-2">
            @include( 'app.sidebars.basic' )
        </div>

        <div id="main_content" class="col-md-8">
            @yield( 'content' )
            @include( 'app.include' )
            @yield( 'footer' )
        </div>

        <div class="col-md-2"></div>
    </div>

</body>
</html>
