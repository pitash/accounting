<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  protected $fillable = ['invoice_no','client_name','due_date','item_name','quantity','price','date','pay_method','desc','status'];

  function getUser()
    {
      return $this->hasOne('App\User','id','created_by');
    }

    function getCust()
    {
      return $this->belongsTo('App\Customer','client_name');
    }

  function getSupp()
    {
      return $this->belongsTo('App\Supplier','to_account');
    }
}
