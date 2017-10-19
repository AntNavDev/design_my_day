<div>
    <ul>
        <li>
            <a href="/">Home</a>
        </li>
        @guest
            <li>
                <a href="{{ route( 'login' ) }}">Login</a>
            </li>
            <li>
                <a href="{{ route( 'register' ) }}">Register</a>
            </li>
        @endguest
        @auth
            <li>
                <a href="{{ route( 'logout' ) }}" onclick="event.preventDefault(); document.getElementById( 'logout-form' ).submit();" class="">Logout</a>
                <form id="logout-form" action="{{ route( 'logout' ) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        @endauth
         <li>
            <a href="{{ route( 'calendar.index' ) }}">Calendar</a>
        </li>
    </ul>
</div>
