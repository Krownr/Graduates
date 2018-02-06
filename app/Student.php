<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name', 'last_name', 'faculty_number', 'speciality_id', 'picture'];

    public $timestamps = false;

    /**
     * Get the student's speciality.
     */
    public function speciality()
    {
        return $this->belongsTo('App\Speciality');
    }

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
