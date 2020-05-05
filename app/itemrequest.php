<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class itemrequest extends Model
{

  protected $fillable = ['requestedItem','date', 'requester'];
    //
}
