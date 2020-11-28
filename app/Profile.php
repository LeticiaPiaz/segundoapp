<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    /**
     *  estabelecendo o relacionamento entre os models 'User' e 'Profile'
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
