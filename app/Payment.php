<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['voucher_no','from_account','pay_method','reference','date','to_account','amount','desc'];

    function getUser()
    {
      return $this->hasOne('App\User','id','created_by');
    }

  function getCust()
    {
      return $this->belongsTo('App\Customer','from_account');
    }

  function getSupp()
    {
      return $this->belongsTo('App\Supplier','to_account');
    }
}
