<div class="row">
    <div class="col-md-offset-4 col-md-4 title">
        @if( ( Request::is( 'calendar/*' ) || Request::is( 'calendar' ) ) && ! ( Request::is( 'calendar/displayWeek/*' ) ) )
            <a href="{{ route( 'changeMonth', [ ( $increment - 1 ), $viewed_month->getYear() ] ) }}" class="btn btn-primary">Previous Month</a>
        @endif
            <span id="month_name">{{ $viewed_month->getMonthAsText() }}</span>, {{ $viewed_month->getYear() }}
        @if( ( Request::is( 'calendar/*' ) || Request::is( 'calendar' ) ) && ! ( Request::is( 'calendar/displayWeek/*' ) ) )
            <a href="{{ route( 'changeMonth', [ ( $increment + 1 ), $viewed_month->getYear() ] ) }}" class="btn btn-primary">Next Month</a>
        @endif
    </div>
    <div class="col-md-4">
        <div class="row view_type_container">
            <a href="{{ route( 'changeMonth', [ $increment, $viewed_month->getYear() ] ) }}"><div class="col-md-4 view_type">Month</div></a>
            <a href="{{ route( 'displayWeek', [ $viewed_month->getFirstDay(), $increment, $viewed_month->getYear() ] ) }}"><div class="col-md-4 view_type">Week</div></a>
            <div class="col-md-4 view_type">Day</div>
        </div>
    </div>
</div>
