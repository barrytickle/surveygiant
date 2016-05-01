<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class choice extends Model
{
    protected $fillable = [
        'ChoiceName'
    ];

    public function question(){
       return $this->belongsToMany('App\question');
    }
}
