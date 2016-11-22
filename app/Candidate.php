<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
   protected $fillable = ['Candidate_Name','Age','Political_Party','Candidate_Info',"Election_id"];
}