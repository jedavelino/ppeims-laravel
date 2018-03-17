<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Get the comments for the blog post.
     */
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
