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
        $this->belongsToMany('App\surveys');
    }

    public function choice(){
        $this->belongsToMany('App\choice');
    }

    public function response(){
        $this->belongsToMany('App\response');
    }
}
