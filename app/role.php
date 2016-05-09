<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    /*
     * Tells eloquent what fields are available to modify in the table
     */
    protected $fillable = [
        'name',
        'label'
    ];

    /*
     * Defines a many to many relationship with users
     */
    public function user(){
        return $this->belongsToMany('App\user');
    }
}
