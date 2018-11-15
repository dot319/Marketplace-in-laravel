<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $guarded = [];

    public function users() {
        return $this->belongsToMany('App\User');
    }

    public function ad() {
        return $this->belongsTo('App\Ad');
    }
}
