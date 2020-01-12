<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable = ['customer','address','phone','cust_id','eamil','comp_name','currency','website','image','under'];

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
