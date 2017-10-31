<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Grid;
use App\Month;
use App\Notifications\CalendarUpdated;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $increment = $request[ 'increment' ];
        $year = $request[ 'viewed_year' ];

        $new_task = Task::create([
            'user_id' => $request[ 'user_id' ],
            'description' => $request[ 'task_description' ],
            'scheduled_date' => $request[ 'my_date' ]
        ]);

        if( $new_task->save() )
        {
            $user = User::find( $request[ 'user_id' ] );
            $user->notify( new CalendarUpdated( $request[ 'task_description' ] ) );
            $request->session()->flash( 'success', 'Task added successfully!' );
        }
        else
        {
            $request->session()->flash( 'failure', 'Something went wrong. Please try again.' );   
        }

        return redirect()->route( 'changeMonth', compact( 'increment', 'year' ) );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }

    public function deleteTask( Request $request )
    {
        $task = Task::find( $request->id );

        if( $task->delete() )
        {
            $request->session()->flash( 'success', 'Task deleted successfully!' );
        }
        else
        {
            $request->session()->flash( 'failure', 'Something went wrong. Please try again.' );
        }
    }
}
