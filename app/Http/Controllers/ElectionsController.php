<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Election;

class ElectionsController extends Controller
{
    protected function  create(array $data)
    {
        // return Election::create([
        //     'Name'=>            $data['Name'], 
        //     'Election_info'=>   $data['Election_info'],
        //     'Date'=>            $data['Date'],
        //     'Election_Type'=>   $data["Election_Type"]
        // ]);
        return view('election.show');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'Name' =>           'Required|Min:3|Max:80|Alpha',
            'Election_info'=>   'Required',
            'Date' =>           'Required|Date',
            'Election_Type' =>  'Required'
        ]);
        Election::create($request->all());
        return redirect()->back()->with('message','Election created successfully');
    }
    
    public function register(Request $request)
    {
        $input = $request->all();
        $election = $this->create($request->all());
        // $election = Election::create($input);
        // $election->store();
        return back()->with('message','Election Updated Successfully.');
        // return $election;
        
    }
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'Name' =>           'Required|Min:3|Max:80|Alpha',
    //         'Election_info'=>   'Required',
    //         'Date' =>           'Required|Date',
    //         'Election_Type' =>  'Required'
    //     ]);
    // }
    public function index()
    {
        return view('election.create');
    }
    public function show()
    {
     //$election = Election::find($Name);
      return view('election.show');
    }
}
