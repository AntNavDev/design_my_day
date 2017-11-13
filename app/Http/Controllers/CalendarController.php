<?php

namespace App\Http\Controllers;

use App\Grid;
use App\Month;
use App\Task;
use App\Week;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $increment = date( 'm' );
        $current_month = ( 0 + date( 'm' ) );
        if( $current_month < 10 )
        {
            $current_month = '0' . $current_month;
        }
        $viewed_month = new Month( $current_month, date( 'Y' ) );
        $my_calendar = new Grid( 6, 7, $viewed_month->getFirstDay(), $viewed_month->getDaysAmount() );

        return view( 'calendar.index', compact( 'my_calendar', 'viewed_month', 'increment' ) );
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grid  $grid
     * @return \Illuminate\Http\Response
     */
    public function show(Grid $grid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grid  $grid
     * @return \Illuminate\Http\Response
     */
    public function edit(Grid $grid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grid  $grid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grid $grid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grid  $grid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grid $grid)
    {
        //
    }

    public function changeMonth( $increment = 1, $year = 0 )
    {
        if( $increment < 1 )
        {
            $year -= 1;
            $increment = 12;
        }
        if( $increment > 12 )
        {
            $year += 1;
            $increment = 1;
        }
        
        $current_month = ( 0 + $increment );
        if( $current_month < 10 )
        {
            $current_month = '0' . $current_month;
        }

        $viewed_month = new Month( $current_month, $year );
        $my_calendar = new Grid( 6, 7, $viewed_month->getFirstDay(), $viewed_month->getDaysAmount() );

        return view( 'calendar.index', compact( 'my_calendar', 'viewed_month', 'increment' ) );
    }

    public function displayWeek( $first_day, $increment = 1, $year = 0 )
    {
        $current_month = ( 0 + $increment );
        if( $current_month < 10 )
        {
            $current_month = '0' . $current_month;
        }

        $viewed_month = new Month( $current_month, $year );

        $my_calendar = new Grid( 2, 7, 0, 7 );

        return view( 'calendar.week-view', compact( 'my_calendar', 'viewed_month', 'increment' ) );
    }
}
