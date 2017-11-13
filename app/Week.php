<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    private $w_first_day = 0;
    private $w_last_day = 0;

    public function __construct( $first_day = 0 )
    {
        $w_first_day = $first_day;
        // This will cause problems for sure. Set up to wrap at the end of the month after we have main funcitonality working
        // Might be able to get the last day as well when we instantiate the model
        $w_last_day = ( $first_day + 7 );
    }

    public function setFirstDay( $first_day = 0 )
    {
        $w_first_day = $first_day;
    }

    public function setLastDay( $last_day = 0 )
    {
        $w_last_day = $last_day;
    }

    public function getFirstDay()
    {
        return $this->w_first_day;
    }

    public function getLastDay()
    {
        return $this->w_last_day;
    }

    public function buildWeek()
    {

    }
}
