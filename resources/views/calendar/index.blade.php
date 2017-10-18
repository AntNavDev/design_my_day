@extends( 'app.shell' )

@section( 'css' )
    <link href="{{ asset( 'css/calendar.css' ) }}" rel="stylesheet">
@endsection

@section( 'content' )
    <div>
        Welcome to {{ config( 'app.name' ) }}!
    </div>
    <div id="calendar_display">
        {{ $my_calendar->displayGrid() }}
    </div>
@endsection

@section( 'footer' )
    <script>
        jQuery( document ).ready( function() {

        } );
    </script>
@endsection
