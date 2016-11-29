<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
   protected $fillable = ['User_id','Election_id','Candidate_id'];
}
