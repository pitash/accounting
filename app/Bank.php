<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
  protected $fillable = ['bank_name','initial_amount','address','eamil','bank_id','acc_no','currency','phone','website','under'];

  function getUser()
    {
      return $this->hasOne('App\User','id','created_by');
    }
  function getCurrency()
    {
      return $this->belongsTo('App\Currency','currency');
    }
}
