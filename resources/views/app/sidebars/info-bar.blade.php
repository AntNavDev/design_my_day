@if( Request::is( 'calendar' ) || Request::is( 'calendar/*' ) )
    @auth
        <link href="{{ asset( 'css/sidebars/info-bar.css' ) }}" rel="stylesheet">
        <form action="{{ route( 'task.store' ) }}" method="POST">
            {{ csrf_field() }}
            @if( isset( $viewed_month ) )
                <input type="hidden" name="viewed_year" value="{{ $viewed_month->getYear() }}">
                <input type="hidden" name="increment" value="{{ $increment }}">
            @endif
            <input type="hidden" name="user_id" value="{{ Auth::user()->getId() }}">
            <input type="hidden" id="selected_date" name="my_date" value="">
            <div id="task_info" class="row">
                <div class="row">
                    <div class="col-md-12">
                        <label for="task_description">Entry for a new task:</label>
                            <textarea id="task_description" name="task_description" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success">Save Task</button>
                    </div>
                </div>
                <div class="row">
                    <label for="days_tasks"><span id="viewed_day"></span></label>
                    <div id="days_tasks"></div>
                </div>
            </div>
        </form>
    @endauth
@endif
