<?php

namespace App;

use App\Day;
use Illuminate\Database\Eloquent\Model;

class Grid extends Model
{
    private $g_length = 0;
    private $g_width = 0;
    private $g_start_point = 0;
    private $g_size = 0;

    public function __construct( $length = 0, $width = 0, $start_point = 0, $size = 0 )
    {
        $this->g_length = $length;
        $this->g_width = $width;
        $this->g_start_point = $start_point;
        $this->g_size = $size;
    }

    public function setLength( $length = 0 )
    {
        $this->g_length = $length;
    }

    public function setWidth( $width = 0 )
    {
        $this->g_width = $width;
    }

    public function setStartPoint( $start_point = 0 )
    {
        $this->g_start_point = $start_point;
    }

    public function setSize( $size = 0 )
    {
        $this->g_size = $size;
    }

    public function getLength()
    {
        return $this->g_length;
    }

    public function getWidth()
    {
        return $this->g_width;
    }

    public function getStartPoint()
    {
        return $this->g_start_point;
    }

    public function getSize()
    {
        return $this->g_size;
    }

    public function getWeekday()
    {
        return array(
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday'
        );
    }

    public function displayGrid()
    {
        $day_of_month = 1;
        $start_display = false;

        for( $outer_index = 0; $outer_index < $this->getLength(); $outer_index++ )
        {
            echo '<div class="row"><div class="col-md-2"></div>';
            for( $inner_index = 0; $inner_index < $this->getWidth(); $inner_index++ )
            {
                if( $inner_index == $this->getStartPoint() )
                {
                    $start_display = true;
                }
                if( $day_of_month <= $this->getSize() && $start_display )
                {
                    $model = new Day( $this->getWeekday()[ $inner_index ], $day_of_month );
                    $model->displayDay();
                    $day_of_month += 1;
                }
                else
                {
                    echo '<div class="day col-md-1"></div>';
                }
            }
            echo '<div class="col-md-3"></div></div>';
        }
    }
}
