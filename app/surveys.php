<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surveys extends Model
{
    protected $fillable = [
        'name',
        'description',
        'expire',
        'slug'
    ];

    public function category(){
        return $this->belongsToMany('App\category');
    }

    public function user(){
        return $this->belongsTo('App\User', 'author_id');
    }
    
    public function question(){
        return $this->belongsToMany('App\question');
    }
}
