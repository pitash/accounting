<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
  protected $fillable = ['purchase_no','party_name','bank_acc','note','date','under','item_name','quantity','rate'];

  function getUser()
    {
      return $this->hasOne('App\User','id','created_by');
    }

  function getBank()
    {
      return $this->belongsTo('App\Bank','bank_acc');
    }

  function getParty()
    {
      return $this->belongsTo('App\Supplier','party_name');
    }

    function getUnder()
    {
      return $this->belongsTo('App\Category','under');
    } 
}
