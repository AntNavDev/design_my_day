<?php

namespace App;

use App\Task;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    private $d_name = '';
    private $d_number = 0;
    private $d_messages = [];

    public function __construct( $name = 'no_name', $number = 0, $messages = [] )
    {
        $this->d_name = $name;
        $this->d_number = $number;
        if( isset( $messages ) )
        {
            foreach( $messages as $message )
            {
                $this->d_messages[] = $message;
            }
        }
    }

    public function setName( $name )
    {
        $this->d_name = $name;
    }

    public function setNumber( $number )
    {
        $this->d_number = $number;
    }

    public function setMessage( $messages )
    {
        $this->d_messages[] = $messages;
    }

    public function getName()
    {
        return $this->d_name;
    }

    public function getNumber()
    {
        return $this->d_number;
    }

    public function getMessages()
    {
        return $this->d_messages;
    }

    /*
     * Keys are designed in the format daymonth
     * With 0 being omitted in the day but kept
     * in the month; 
     * ex. 101 = 1, 01 (day one of month one)
     * ex. 1402 = 14, 02 (day fourteen of month two)
     */
    public function staticHolidays()
    {
        return array(
            '101'  => 'New Year\'s Day',
            '1402' => 'Valentine\'s Day',
            '1703' => 'Saint Patrick\'s Day',
            '104'  => 'April Fools Day',
            '407'  => 'Independence Day',
            '3110' => 'Halloween',
            '2512' => 'Christmas'
        );
    }

    /*
     * !! UNDER CONSTRUCTION !!
     * Day of week 0~6, X day of month(2nd thursday, 3rd tuesday, etc) 0~5, month 1~12
     * !! NEW FEATURE THAT SEEMS TO BE WORKING !!
     */
    public function dynamicHolidays()
    {
        return array(
            '4311' => 'Thanksgiving'
        );
    }

    public function displayDay( $classes = [], $fulldate = '' )
    {
        $classes_for_day = 'day col-md-1';
        if( isset( $classes ) )
        {
            foreach( $classes as $class )
            {
                $classes_for_day = $classes_for_day . ' ' . $class;
            } 
        }

        if( Auth::user() )
        {
            $tasks = Task::where( 'scheduled_date', '=', $fulldate )->where( 'user_id', '=', Auth::user()->getId() )->get();
        }
        
        echo '<div class="' . $classes_for_day . '">';
        echo '<input type="hidden" name="my_date" value="' . $fulldate . '">';
        echo '<span name="my_day_number">' . $this->getNumber() . '</span><br>';
        echo '<span name="my_day_of_week">' . $this->getName() . '</span><br>';

        $messages = $this->getMessages();
        if( isset( $messages ) )
        {
            foreach( $messages as $message )
            {
                echo '<span class="day_message">' . $message . '</span><br>';
            }
        }
        echo '<ul name="task_list">';

        if( isset( $tasks ) )
        {
            foreach( $tasks as $task )
            {
                echo '<div class="task_info"><input type="hidden" name="task_id" value="' . $task->getId() . '">';
                echo '<li name="task_description">' . $task->getDescription() . '</li></div>';
            }
        }
        echo '</ul>';
        echo '</div>';
    }

    public function displayPlaceholder()
    {
        echo '<div class="hide_day col-md-1"></div>';
    }
}
