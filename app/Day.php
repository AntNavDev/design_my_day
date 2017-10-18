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
}
