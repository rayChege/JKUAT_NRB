<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected  $table = 'events';

    protected $fillable = [
        'title', 'description', 'image','user_id'
    ];

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
}