<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class response extends Model
{
    protected $fillable = [
        'ResponseName'
    ];

    public function question(){
        $this->belongsToMany('App\question');
    }
}
