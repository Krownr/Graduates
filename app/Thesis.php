<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    protected $fillable = ['student_id', 'supervisor_id', 'topic', 'mark', 'presentation_date'];

    /**
     * Get the supervisor that wrote the mark
     */
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    /**
     * Get the supervisor that wrote the mark
     */
    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor');
    }
}
