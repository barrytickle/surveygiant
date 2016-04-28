<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'CategoryName',
        'CategoryDescription'
    ];

    public function surveys(){
        return $this->belongsToMany('App\surveys');
    }
}
