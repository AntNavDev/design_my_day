<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'description', 'scheduled_date',
    ];

    public function getId()
    {
        return $this->id;   
    }

    public function getDescription()
    {
        return $this->description;
    }

    function user()
    {
        return $this->belongsTo( 'App\User' );
    }

}
