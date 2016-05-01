<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = [
        'QuestionName',
        'QuestionType'
    ];

    public function surveys(){
        return $this->belongsToMany('App\surveys');
    }

    public function choice(){
        return $this->belongsToMany('App\choice');
    }

    public function response(){
        return $this->belongsToMany('App\response');
    }
}
