@extends( 'app.shell' )

@section( 'css' )
    <link href="{{ asset( 'css/calendar.css' ) }}" rel="stylesheet">
@endsection

@section( 'content' )
    <div>
        Welcome to {{ config( 'app.name' ) }}!
    </div>
    <div id="calendar_display">
        @include( 'app.nav-bar' )
        <div id="calendar_body" class="row">
            <div class="col-md-offset-1 col-md-11">
                {{ $my_calendar->displayGrid( $viewed_month->getMonth(), $viewed_month->getYear() ) }}
            </div>
        </div>
    </div>
@endsection

@section( 'footer' )
    <script type="text/javascript" src="{{ URL::asset( 'js/calendar/calendar.js' ) }}"></script>
@endsection
