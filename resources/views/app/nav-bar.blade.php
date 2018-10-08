<div class="row nav-bar">
    <div class="col-md-1 nav-link">
        <a href="/">Home</a>
    </div>

    <div class="col-md-1 nav-link">
        @guest
            <a href="{{ route( 'login' ) }}">Login</a>
        @endguest
        @auth
            <a href="{{ route( 'logout' ) }}" onclick="event.preventDefault(); document.getElementById( 'logout-form' ).submit();" class="">Logout</a>
            <form id="logout-form" action="{{ route( 'logout' ) }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endauth
    </div>

    <div class="col-md-1 nav-link">
        @guest
            <a href="{{ route( 'register' ) }}">Register</a>
        @endguest
    </div>

    <div class="col-md-1 nav-link">
        <a href="{{ route( 'calendar.index' ) }}">Calendar</a>
    </div>

    <div class="col-md-4 title">
        @if( isset( $viewed_month ) )
            @if( ( Request::is( 'calendar/*' ) || Request::is( 'calendar' ) ) && ! ( Request::is( 'calendar/displayWeek/*' ) ) )
                <a href="{{ route( 'changeMonth', [ ( $increment - 1 ), $viewed_month->getYear() ] ) }}" class="nav-button"><i class="fas fa-angle-left"></i></a>
            @endif
                <span class="title_info">
                    <span id="month_name">{{ $viewed_month->getMonthAsText() }}</span>, 
                    <span id="current_year">{{ $viewed_month->getYear() }}</span>
                    <input id="current_increment" type="hidden" value="{{ $increment }}">
                </span>
            @if( ( Request::is( 'calendar/*' ) || Request::is( 'calendar' ) ) && ! ( Request::is( 'calendar/displayWeek/*' ) ) )
                <a href="{{ route( 'changeMonth', [ ( $increment + 1 ), $viewed_month->getYear() ] ) }}" class="nav-button"><i class="fas fa-angle-right"></i></a>
            @endif
        @endif
    </div>
    
    <div class="col-md-4">
        <div class="row view_type_container">
            @if( isset($increment) )
                <!-- <a id="month_view_link" href="{{ route( 'changeMonth', [ $increment, $viewed_month->getYear() ] ) }}" class="view_type"><div class="col-md-4">Month</div></a>
                <a id="week_view_link" href="{{ route( 'displayWeek', [ 1, $increment, $viewed_month->getYear() ] ) }}" class="view_type"><div class="col-md-4">Week</div></a>
                <div class="col-md-4 view_type">Day</div> -->
            @endif
        </div>
    </div>
</div>