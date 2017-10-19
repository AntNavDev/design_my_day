<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    private $d_name = '';
    private $d_number = 0;
    private $d_message = '';

    public function __construct( $name = 'no_name', $number = 0, $message = '' )
    {
        $this->d_name = $name;
        $this->d_number = $number;
        $this->d_message = $message;
    }

    public function setName( $name )
    {
        $this->d_name = $name;
    }

    public function setNumber( $number )
    {
        $this->d_number = $number;
    }

    public function setMessage( $message )
    {
        $this->d_message = $message;
    }

    public function getName()
    {
        return $this->d_name;
    }

    public function getNumber()
    {
        return $this->d_number;
    }

    public function getMessage()
    {
        return $this->d_message;
    }

    public function daysOfSignificance()
    {
        return array(
            '2512' => 'Christmas',
            '2311' => 'Thanksgiving',
            '101'   => 'New Year\'s Day'
        );
    }

    public function displayDay( $classes = [] )
    {
        $classes_for_day = 'day col-md-1';
        if( isset( $classes ) )
        {
            foreach( $classes as $class )
            {
                $classes_for_day = $classes_for_day . ' ' . $class;
            } 
        }
        
        echo '<div class="' . $classes_for_day . '">';
        echo $this->getNumber() . '<br>';
        echo $this->getName() . '<br>';
        echo '<span class="day_message">' . $this->getMessage() . '</span><br>';
        echo '</div>';
    }

    public function displayPlaceholder()
    {
        echo '<div class="hide_day col-md-1"></div>';
    }
}
