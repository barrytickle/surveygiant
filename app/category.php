<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    /*
     * Tells eloquent what fields are available to modify in the table
     */
    protected $fillable = [
        'CategoryName',
        'CategoryDescription'
    ];

    /*
     * This will allow a many to many connection to surveys.
     */
    public function surveys(){
        return $this->belongsToMany('App\surveys');
    }
}
