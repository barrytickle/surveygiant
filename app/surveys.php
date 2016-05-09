<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surveys extends Model
{
    /*
     * Tells eloquent what fields are available to modify in the table
     */
    protected $fillable = [
        'name',
        'description',
        'expire',
        'slug'
    ];
    /*
     * Defines a many to many relationship with categories
     */

    public function category(){
        return $this->belongsToMany('App\category');
    }
    /*
     * Defines a one to many relationship with users.
     */

    public function user(){
        return $this->belongsTo('App\User', 'author_id');
    }
    /*
     * Defines a many to many relationship with questions
     */
    
    public function question(){
        return $this->belongsToMany('App\question');
    }
}
