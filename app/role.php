<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $fillable = [
        'name',
        'label'
    ];

    public function user(){
        return $this->belongsToMany('App\user');
    }
}
