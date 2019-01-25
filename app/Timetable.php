<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $fillable = [
        'department_id', 'year_id', 'document_name'
    ];

    public function departments(){

        return $this->belongsTo('App/Departments', 'department_id');
    }

    public function years(){

        return $this->belongsTo('App/Years', 'year_id');
    }
}
