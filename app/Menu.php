<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{



 public function userName()
    {
        // return User::where('id',$this->user_id)->first()->name;
        return $this->belongsTo('App\User','created_by');
        
    }


}
