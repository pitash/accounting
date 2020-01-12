<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

  protected $fillable = ['company','start_date','address','eamil','website','phone','comp_logo','end_date','comp_id','currency'];

    function getUser()
      {
        return $this->hasOne('App\User','id','created_by');
      }
      
    function getCurrency()
    {
      return $this->belongsTo('App\Currency','currency');
    } 
}
