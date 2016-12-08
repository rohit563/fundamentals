<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use Illuminate\Support\Facades\Input;
use App\Election;
use App\Candidate;
use App\Vote;
use Carbon\Carbon;

class usercontroller extends Controller
{
    //
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'username' => 'required|unique:users',
            'gender' => 'required',
            'address1' => 'required',
            'zip' => 'required|min:5',
            'dob' => 'required|date', 
            'type' => 'min:1',
        ]);
    }
    
    public function update(Request $request) {
        
        $input = $request->only('name','email', 'address1', 'address2', 'city', 'state', 'zip');
        $user = Auth::user();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->address1 = $input['address1'];
        $user->address2 = $input['address2'];
        $user->city = $input['city'];
        $user->state = $input['state'];
        $user->zip = $input['zip'];
        $user->save();
        
        return back()->with('message', 'Profile Updated Successfully.');
        // return Redirect::to('/profile')->with('message', 'User Updated');
    }
    
    public function edit($id) {
    
    }
    
    public function index()
    {
        return view('users.index');
    }
    public function view()
    {
        $elections = Election::all();
        $candidates = Candidate::all();
        $count = $elections->count();
        $ccount = $candidates->count();
        $votes = Vote::all();
        $time = Carbon::now();
        return view('user',compact('elections','candidates','count','ccount','votes','time'));
    }
}
