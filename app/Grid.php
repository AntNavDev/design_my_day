<?php

namespace App;

use App\Day;
use App\Month;
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

    public function displayWeek( $first_day = 0, $last_day = 0 )
    {
        // I think this looks ugly, but it works for now
        // May try and rework later
        $day_name_int = 0;
        echo '<div class="row">';
        for( $index = 0; $index < 17; $index++ )
        {
            $day = new Day( $this->getWeekday()[ $day_name_int ], ( $first_day + $day_name_int ) );
            $condition = ( $index < 10 ) || ( ( $first_day + $day_name_int ) < 1 );
            dump( $condition );
            if( $condition )// ( $index < 10 ) || ( ( $first_day + $day_name_int ) < 1 ) )
            {
                $day->displayPlaceholder();
            }
            else
            {
                $day->displayDay();
                $day_name_int++;
            }
        }
        echo '</div>';
    }

    public function displayMonth( $displayed_month = 0, $displayed_year = 0 )
    {
        $day_of_month = 1;
        $start_display = false;
        $month_size = $this->getSize();
        $grid_size = 0;
        // This will indicate what days of the week were skipped before the calendar was started
        $omitted_days = [];

        for( $outer_index = 0; $outer_index < $this->getHeight(); $outer_index++ )
        {
            echo '<div class="row calendar_container">';
            for( $inner_index = 0; $inner_index < $this->getWidth(); $inner_index++ )
            {
                $day = new Day( $this->getWeekday()[ $inner_index ], $day_of_month );

                if( $inner_index == $this->getStartPoint() )
                {   
                    $start_display = true;
                }
                else
                {
                    if( ! $start_display )
                    {
                        $omitted_days[] = $grid_size;
                    }
                }
                
                if( ( $day_of_month <= $month_size ) && $start_display )
                {
                    $displayed_fulldate = ( $day_of_month . $displayed_month . $displayed_year );

                    $classes = [];

                    $day_of_week_integer = $grid_size % 7;
                    $week_of_month = ( $grid_size - $day_of_week_integer ) / 7;
                    // If the day of the week is in the omitted days, we subtract one to indicate that 
                    // X day of the month wasn't counted when it wasn't supposed to be.
                    // (examples of the problem would be 4th Thursday in Novemeber)
                    if( in_array( $day_of_week_integer, $omitted_days ) )
                    {
                        $week_of_month -= 1;
                    }

                    // Add static holidays
                    if( array_key_exists( ( $day_of_month . $displayed_month ), $day->staticHolidays() ) )
                    {
                        $day->setMessage( $day->staticHolidays()[ ( $day_of_month . $displayed_month ) ] );
                    }
                    // Add dynamic holidays
                    if( array_key_exists( ( $day_of_week_integer . $week_of_month . $displayed_month ), $day->dynamicHolidays() ) )
                    {
                        $day->setMessage( $day->dynamicHolidays()[ ( $day_of_week_integer . $week_of_month . $displayed_month ) ] );   
                    }
                    
                    // TODO: Check date against a user determined timezone and not whatever 'date()' is

                    // Add indicator for current day
                    if( $displayed_fulldate == date( 'jmY' ) )
                    {
                        $classes[] = 'today';
                        $day->setMessage( 'Today' );
                    }

                    // Add Day odd/even classes
                    $current_month = strtolower( Month::convertMonthToText()[ $displayed_month - 1 ] );
                    
                    if( $day_of_month % 2 == 0 )
                    {
                        $classes[] = $current_month . '_day_even';
                    }
                    else
                    {
                        $classes[] = $current_month . '_day_odd';
                    }

                    $day->displayDay( $classes, $displayed_fulldate );
                    $day_of_month += 1;
                }
                else
                {
                    $day->displayPlaceholder();
                }
                $grid_size++;
            }
            echo '<div class="col-md-3"></div></div>';
        }
    }

    public function displayYear()
    {
        $month_counter = 0;
        for( $outer_index = 0; $outer_index < $this->getHeight(); $outer_index++ )
        {
            echo '<div class="row home_container">';
            
            for( $inner_index = 0; $inner_index < $this->getWidth(); $inner_index++ )
            {
                echo '<a href="' . route(  'changeMonth', [ ( $month_counter + 1 ), date( 'Y' )]  ) . '">';
                echo '<div class="col-md-3 little_month ' . lcfirst( Month::convertMonthToText()[ $month_counter ] ) . '">';
                echo '<div class="row"><div class="col-md-12 month_name">' . Month::convertMonthToText()[ $month_counter ] . '</div></div>';
                echo '</div>';
                echo '</a>';
                
                
                $month_counter++;
            }

            echo '</div>';
        }
    }
}
