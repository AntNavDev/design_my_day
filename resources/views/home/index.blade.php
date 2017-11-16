@extends( 'app.shell' )

@section( 'css' )
    <link href="{{ asset( 'css/homepage.css' ) }}" rel="stylesheet">
@endsection

@section( 'content' )
    <div id="calendar_display" class="">
        {{ $year_grid->displayYear() }}
    </div>
@endsection

@section( 'footer' )
    <script>
        jQuery( document ).ready( function() {
            $( 'body' ).addClass( 'home_background' );
        } );
    </script>
@endsection
