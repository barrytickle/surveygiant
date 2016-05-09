<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    /*
     * Tells eloquent what fields are available to modify in the table
     */
    protected $fillable = [
        'QuestionName',
        'QuestionType'
    ];
    /*
     * Defines a many to many relationship with surveys
     */

    public function surveys(){
        return $this->belongsToMany('App\surveys');
    }

    /*
     * Defines a many to many relationship with choices
     */
    public function choice(){
        return $this->belongsToMany('App\choice');
    }

    /*
     * Defines a many to many relationship with response
     */
    public function response(){
        return $this->belongsToMany('App\response');
    }
}
