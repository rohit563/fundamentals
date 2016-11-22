<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
   protected $fillable = ['Name','Election_info','Date','Election_Type','Number_of_Candidates'];
}
