<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiveVoucher extends Model
{
  protected $fillable = ['party_name','bill_date','order_number','quantity','rate','to_account','due_date','item_name','desc'];

  function getUser()
  {
    return $this->hasOne('App\User','id','created_by');
  }

function getCust()
  {
    return $this->belongsTo('App\Customer','party_name');
  }

function getSupp()
  {
    return $this->belongsTo('App\Supplier','to_account');
  }
}
