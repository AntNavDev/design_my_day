@if( Request::is( 'calendar' ) || Request::is( 'calendar/*' ) )
    <link href="{{ asset( 'css/sidebars/info-bar.css' ) }}" rel="stylesheet">
    <form action="{{ route( 'task.store' ) }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ Auth::user()->getId() }}">
        <input type="hidden" id="selected_date" name="my_date" value="">
        <div id="task_info" class="row">
            <div class="row">
                <div class="col-md-12">
                    <textarea id="task_description" name="task_description"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-success">Save Task</button>
                </div>
            </div>
            <div class="row">
                <div id="days_tasks">
                </div>
            </div>
        </div>
    </form>
@endif
