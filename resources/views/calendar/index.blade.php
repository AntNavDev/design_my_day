@extends( 'app.shell' )

@section( 'content' )
    <div>
        Welcome to {{ config( 'app.name' ) }}!
    </div>
    <div id="calendar_display">
        {{ $my_calendar->display() }}
    </div>
@endsection

@section( 'footer' )
    <script>
        jQuery( document ).ready( function() {

        } );
    </script>
@endsection
