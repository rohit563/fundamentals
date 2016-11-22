<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Election;
use App\Candidate;

class ElectionsController extends Controller
{
    protected function create(array $data)
    {
        return view('election.show');
    }
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'Name' =>           'Required',
        //     'Election_info'=>   'Required',
        //     'Date' =>           'Required|Date',
        //     'Election_Type' =>  'Required'
        // ]);
    
        $election = new Election();
        $election->Name = $request->Name;
        $election->Election_info = $request->Election_info;
        $election-> Date = $request->Date;
        $election->Election_Type = $request->Election_Type;
        $election->save();
        
        
        // Election::create($request->only(['Name', 'Election_info','Date','Election_Type']));
        //Dynamic Candidate Creation
        $c = count($request->Candidate_Name);
        for($i=0;$i<$c;$i++){
            
            $candidate = new Candidate();
            $candidate->Candidate_Name = $request->Candidate_Name[$i];
            $candidate->Age = $request->Age[$i];
            $candidate->Political_Party = $request->Political_Party[$i];
            $candidate->Candidate_Info = $request->Candidate_Info[$i];
            $candidate->Election_id = $election->id;
            $candidate->save();
        }
        return redirect()->back()->with('message','Election and Candidates created successfully');
    }
    
    public function register(Request $request)
    {
        $input = $request->all();
        $election = $this->create($request->all());
        return back()->with('message','Election Updated Successfully.');
    }
    public function index()
    {
        return view('election.create');
    }
    public function show($id)
    {
        $election = Election::find($id);
        return view('election.show',compact('election'));
    }
}
