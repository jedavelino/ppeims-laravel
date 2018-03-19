<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * Get the department that this employee
     * belongs to.
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
