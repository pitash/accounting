<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
  protected $fillable = ['journal_no','item_name','depre_name','amount','date','under','desc'];

  function getUser()
    {
      return $this->hasOne('App\User','id','created_by');
    }

    function getUnder()
    {
      return $this->belongsTo('App\Category','under');
    }
}
