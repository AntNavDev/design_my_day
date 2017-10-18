@extends( 'app.shell' )

@section( 'content' )
    <div>
        Welcome to {{ config( 'app.name' ) }}!
    </div>
@endsection

@section( 'footer' )
    <script>
        jQuery( document ).ready( function() {

        } );
    </script>
@endsection
