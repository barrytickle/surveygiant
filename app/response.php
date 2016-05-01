<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class response extends Model
{
    protected $fillable = [
        'ResponseName'
    ];

    public function question(){
        return $this->belongsToMany('App\question');
    }
}
