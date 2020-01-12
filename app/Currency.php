<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
  protected $fillable = ['name','code','symbol','rate','note','created_by'];
    
  function getUser()
    {
      return $this->hasOne('App\User','id','created_by');
    }
}
