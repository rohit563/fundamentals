<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
   protected $fillable = array('Candidate_Name','Age','Political_Party','Candidate_Info');
}