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
            <div class="col-md-offset-4 col-md-4 title">
                {{-- <a href="{{ route( 'changeMonth', [ ( $increment - 1 ), $viewed_month->getYear() ] ) }}" class="btn btn-primary">Previous Week</a>
                
                <a href="{{ route( 'changeMonth', [ ( $increment + 1 ), $viewed_month->getYear() ] ) }}" class="btn btn-primary">Next Week</a> --}}
            </div>
            <div class="col-md-4">
                <div class="row view_type_container">
                    <a href="{{ route( 'changeMonth', [ $increment, $viewed_month->getYear() ] ) }}"><div class="col-md-4 view_type">Month</div></a>
                    <div class="col-md-4 view_type selected">Week</div>
                    <div class="col-md-4 view_type">Day</div>
                </div>
            </div>
        </div>
        {{ $my_calendar->displayGrid( 0, 0, true ) }}
    </div>
@endsection

@section( 'footer' )

@endsection
