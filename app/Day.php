<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    private $d_name = '';
    private $d_number = 0;

    public function __construct( $name = 'no_name', $number = 0 )
    {
        $this->d_name = $name;
        $this->d_number = $number;
    }

    public function setName( $name )
    {
        $this->d_name = $name;
    }

    public function setNumber( $number )
    {
        $this->d_number = $number;
    }

    public function getName()
    {
        return $this->d_name;
    }

    public function getNumber()
    {
        return $this->d_number;
    }

    public function displayDay()
    {
        echo '<div class="day col-md-1">';
        echo $this->getNumber() . '<br>';
        echo $this->getName() . '<br>';
        echo '</div>';
    }
}
