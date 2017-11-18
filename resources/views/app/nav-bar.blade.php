<div class="row">
    <div class="col-md-offset-4 col-md-4 title">
        @if( ( Request::is( 'calendar/*' ) || Request::is( 'calendar' ) ) && ! ( Request::is( 'calendar/displayWeek/*' ) ) )
            <a href="{{ route( 'changeMonth', [ ( $increment - 1 ), $viewed_month->getYear() ] ) }}" class="btn btn-primary">Previous Month</a>
        @endif
            <span class="title_info">
                <span id="month_name">{{ $viewed_month->getMonthAsText() }}</span>, 
                <span id="current_year">{{ $viewed_month->getYear() }}</span>
                <input id="current_increment" type="hidden" value="{{ $increment }}">
            </span>
        @if( ( Request::is( 'calendar/*' ) || Request::is( 'calendar' ) ) && ! ( Request::is( 'calendar/displayWeek/*' ) ) )
            <a href="{{ route( 'changeMonth', [ ( $increment + 1 ), $viewed_month->getYear() ] ) }}" class="btn btn-primary">Next Month</a>
        @endif
    </div>
    <div class="col-md-4">
        <div class="row view_type_container">
            <a id="month_view_link" href="{{ route( 'changeMonth', [ $increment, $viewed_month->getYear() ] ) }}" class="view_type"><div class="col-md-4">Month</div></a>
            <a id="week_view_link" href="{{ route( 'displayWeek', [ 1, $increment, $viewed_month->getYear() ] ) }}" class="view_type"><div class="col-md-4">Week</div></a>
            <div class="col-md-4 view_type">Day</div>
        </div>
    </div>
</div>
