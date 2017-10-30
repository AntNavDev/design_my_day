<?php

namespace App;

use App\Day;
use Illuminate\Database\Eloquent\Model;

class Grid extends Model
{
    private $g_height = 0;
    private $g_width = 0;
    private $g_start_point = 0;
    private $g_size = 0;

    public function __construct( $height = 0, $width = 0, $start_point = 0, $size = 0 )
    {
        $this->g_height = $height;
        $this->g_width = $width;
        $this->g_start_point = $start_point;
        $this->g_size = $size;
    }

    public function setHeight( $height = 0 )
    {
        $this->g_height = $height;
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

    public function getHeight()
    {
        return $this->g_height;
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

    public function displayGrid( $displayed_month, $displayed_year )
    {
        $day_of_month = 1;
        $start_display = false;
        $month_size = $this->getSize();

        for( $outer_index = 0; $outer_index < $this->getHeight(); $outer_index++ )
        {
            echo '<div class="row"><div class="col-md-2"></div>';
            for( $inner_index = 0; $inner_index < $this->getWidth(); $inner_index++ )
            {
                $day = new Day( $this->getWeekday()[ $inner_index ], $day_of_month );
                if( $inner_index == $this->getStartPoint() )
                {
                    $start_display = true;
                }
                
                if( ( $day_of_month <= $month_size ) && $start_display )
                {
                    $displayed_fulldate = ( $day_of_month . $displayed_month . $displayed_year );

                    $classes = [];

                    if( array_key_exists( ( $day_of_month . $displayed_month ), $day->daysOfSignificance() ) )
                    {
                        $day->setMessage( $day->daysOfSignificance()[ ( $day_of_month . $displayed_month ) ] );
                    }
                    if( $displayed_fulldate == date( 'jmY' ) )
                    {
                        $classes[] = 'today';
                        $day->setMessage( 'Today' );
                    }
                    $day->displayDay( $classes, $displayed_fulldate );
                    $day_of_month += 1;
                }
                else
                {
                    $day->displayPlaceholder();
                }
            }
            echo '<div class="col-md-3"></div></div>';
        }
    }
}
