<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  protected $fillable = ['supplier','address','eamil','sup_id','currency','phone','image','under'];

  function getUser()
    {
      return $this->hasOne('App\User','id','created_by');
    }

    function getCurrency()
    {
      return $this->belongsTo('App\Currency','currency');
    } 
    
    function getUnder()
    {
      return $this->belongsTo('App\Category','under');
    } 
}
