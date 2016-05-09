<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class choice extends Model
{
    /*
     * Tells eloquent what fields are available to modify in the table
     */
    protected $fillable = [
        'ChoiceName'
    ];

    /*
     * Defines a many to many relationship with questions
     */

    public function question(){
       return $this->belongsToMany('App\question');
    }
}
