<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
   protected $fillable = ['Name','Election_Info','Date','Election_Type'];
}
