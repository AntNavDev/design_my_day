<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    private $m_month = 0;
    private $m_year = 0;
    private $m_days_amount = 0;
    private $m_first_day = 0;

    public function __construct( $month = 0, $year = 0, $days_amount = 0, $first_day = 0 )
    {
        $this->m_month = $month;
        $this->m_year = $year;
        if( ! empty( $days_amount ) )
        {
            $this->m_days_amount = $days_amount;
        }
        else
        {
            $this->m_days_amount = date( 't', mktime( 0, 0, 0, $month, 1, $year ) );
        }

        if( $first_day != 0 && gettype( $first_day ) == 'integer' )
        {
            $this->m_first_day = $first_day;
        }
        else
        {
            $day_of_week = strtotime( (string) $this->getYear() . $this->getMonth() . '01' );
            $this->m_first_day = date( 'w', $day_of_week );
        }
    }

    public function setMonth( $month = 0 )
    {
        $this->m_month = $month;
    }

    public function setYear( $year = 0 )
    {
        $this->m_year = $year;
    }

    public function setDaysAmount( $days_amount = 0 )
    {
        $this->m_days_amount = $days_amount;
    }

    public function setFirstDay( $first_day = 'no-day' )
    {
        $this->m_first_day = $first_day;
    }

    public function getMonth()
    {
        return $this->m_month;
    }

    public function getYear()
    {
        return $this->m_year;
    }

    public function getDaysAmount()
    {
        return $this->m_days_amount;
    }

    public function getFirstDay()
    {
        return $this->m_first_day;
    }

    public function getMonthAsText()
    {
        return $this->convertMonthToText()[ $this->getMonth() - 1 ];
    }

    private function convertMonthToText()
    {
        return array(
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        );
    }
}
