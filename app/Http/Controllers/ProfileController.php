<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    //
            /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }
    
    public function update(Request $request)
    {
        $user = $request->user();
        $data['name'] = $request->input('name');
        $data['email']=$request->input('email');
        $data['address1'] = $request->input('address1');
        $data['address2']=$request->input('address2');
        $data['city'] = $request->input('city');
        $data['state']=$request->input('state');
        $data['zip']=$request->input('zip');
        $data['type']=$request->input('type');
        
        $user->user_info -> $data->save();
        
        return redirect("/profile")->with('message', 'User has been updated!');;
    }
    public function getProfile()
    {
        return View::make('profile');
    }
    

}
