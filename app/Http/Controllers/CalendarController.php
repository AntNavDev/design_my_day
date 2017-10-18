<?php

namespace App\Http\Controllers;

use App\Grid;
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
        $my_calendar = new Grid( 5, 7 );
        return view( 'calendar.index', compact( 'my_calendar' ) );
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
}
