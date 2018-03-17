<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * Get the department record associated with the employee.
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
