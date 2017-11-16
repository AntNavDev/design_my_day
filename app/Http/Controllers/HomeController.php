<?php

namespace App\Http\Controllers;

use App\Grid;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year_grid = new Grid( 3, 4, 0, 12 );

        return view( 'home.index', compact( 'year_grid' ) );
    }
}
