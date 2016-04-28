<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class choice extends Model
{
    protected $fillable = [
        'ChoiceName'
    ];

    public function question(){
        $this->belongsToMany('App\question');
    }
}
