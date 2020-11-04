<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function answers()
    {
       return $this->hasMany('App\Models\Answer');
    }
}
