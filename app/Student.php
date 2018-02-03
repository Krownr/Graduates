<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name', 'last_name', 'faculty_number', 'speciality_id'];

    public $timestamps = false;

    /**
     * Get the students's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return preg_replace('/\s+/', ' ',$this->first_name.' '.$this->last_name);
    }
}
