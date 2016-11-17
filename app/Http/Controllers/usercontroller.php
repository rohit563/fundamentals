<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use Illuminate\Support\Facades\Input;

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
        
        // var_dump($id)
        // $user = User::find($users);
        // var_dump($user->id);
        $input = $request->only('name','email', 'address1', 'address2', 'city', 'state', 'zip');
        $user = Auth::user();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->address1 = $input['address1'];
        $user->address2 = $input['address2'];
        $user->city = $input['city'];
        $user->state = $input['state'];
        $user->zip = $input['zip'];
        // $user->name = \Input::get('name');
        // $user->email = \Input::get('email');
        // $user->address1 = \Input::get('address1');
        // $user->address2 = \Input::get('address2');
        // $user->city = \Input::get('city');
        // $user->state = \Input::get('state');
        // $user->zip = \Input::get('zip');
        // $user->type = \Input::get('type');
        $user->save();
        
        return back()->with('message', 'Profile Updated Successfully.');
        // return Redirect::to('/profile')->with('message', 'User Updated');
    }
    
    public function edit($id) {
    
    }
    
    public function index()
    {
        return view('users.index');
        

        // return View::make('users.index', compact('users'));
    }
}
