<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded =[];

// ICI NOUS AVONS LE MODEL ENFANT 

    public function commentable(){

        return $this->morphTo();
    }


    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
