<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CandidateController extends Controller
{
   public function store(Request $request)
    {
        
        // Candidate Creation
        $this->validate($request, [
            'Candidate_Name' => 'Required',
            'Age'=>             'Required',
            'Political_Party' => 'Required',
            'Candidate_Info' => 'Required'
        ]);
        Candidate::create($request->all());
        
        return redirect()->back()->with('message','Candidates created successfully');
    }
}
