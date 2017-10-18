<?php

namespace App;

use App\Day;
use Illuminate\Database\Eloquent\Model;

class Grid extends Model
{
    private $g_length = 0;
    private $g_width = 0;

    public function __construct( $length = 0, $width = 0 )
    {
        $this->g_length = $length;
        $this->g_width = $width;
    }

    public function setLength( $length = 0 )
    {
        $this->g_length = $length;
    }

    public function setWidth( $width = 0 )
    {
        $this->g_width = $width;
    }

    public function getLength()
    {
        return $this->g_length;
    }

    public function getWidth()
    {
        return $this->g_width;
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
        $counter = 1;
        for( $outer_index = 0; $outer_index < $this->g_length; $outer_index++ )
        {
            echo '<div class="row"><div class="col-md-2"></div>';
            for( $inner_index = 0; $inner_index < $this->g_width; $inner_index++ )
            {
                $model = new Day( $this->getWeekday()[ $inner_index ], $counter );
                $model->displayDay();
                $counter += 1;
            }
            echo '<div class="col-md-3"></div></div>';
        }
    }
}
