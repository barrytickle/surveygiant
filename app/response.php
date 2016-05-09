<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class response extends Model
{
    /*
     * Tells eloquent what fields are available to modify in the table
     */
    protected $fillable = [
        'ResponseName'
    ];
    /*
     * Defines a many to many relationship with question
     */

    public function question(){
        return $this->belongsToMany('App\question');
    }
}
