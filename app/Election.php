<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
   protected $fillable = ['Name','Election_info','Election_Type','precinctID','isEnabled','publishResults','startDate','endDate'];
}
