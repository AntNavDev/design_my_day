@extends( 'app.shell' )

@section( 'css' )
    <link href="{{ asset( 'css/calendar.css' ) }}" rel="stylesheet">
@endsection

@section( 'content' )
    <div>
        Welcome to {{ config( 'app.name' ) }}!
    </div>
    <div id="calendar_display">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 title">
                <a href="{{ route( 'changeMonth', [ ( $increment - 1 ), $viewed_month->getYear() ] ) }}" class="btn btn-primary">Previous Month</a>
                {{ $viewed_month->getMonthAsText() }}, {{ $viewed_month->getYear() }}
                <a href="{{ route( 'changeMonth', [ ( $increment + 1 ), $viewed_month->getYear() ] ) }}" class="btn btn-primary">Next Month</a>
            </div>
            <div class="col-md-2"></div>
        </div>
        {{ $my_calendar->displayGrid( $viewed_month->getMonth(), $viewed_month->getYear() ) }}
    </div>
@endsection

@section( 'footer' )
    <script type="text/javascript" src="{{ URL::asset( 'js/calendar/calendar.js' ) }}"></script>
@endsection
