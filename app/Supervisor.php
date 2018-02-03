<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $fillable = ['first_name', 'last_name'];

    public $timestamps = false;

    /**
     * Get the supervisor's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return preg_replace('/\s+/', ' ',$this->first_name.' '.$this->last_name);
    }
}
