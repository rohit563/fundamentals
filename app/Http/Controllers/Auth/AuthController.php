<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use DB;
use App\ActivationService;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $activationService;
    protected $username = 'username';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
     public function __construct(ActivationService $activationService)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->activationService = $activationService;
    }
    // public function __construct()
    // {
    //     $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $zip = $data['zip'];
        try {
            $precinct = DB::table('zipcodes')->where('zipcode', $zip)->pluck('precinctID');
            if(!isset($precinct[0])) {
                $precinct[0] = '';
            }
        } catch (Exception $e) {
            return Redirect::to('/register')->with('danger', 'Please Enter A Valid Zip Code.');
        }

        
        // $zipRow = DB::table('users')->where('zipcode', $zip)->first();
        return User::create([
            
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'username' => $data['username'],
            'passport' => $data['passport'],
            'driversLicense' => $data['driversLicense'],
            'gender' => $data['gender'],
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'zip' => $data['zip'],
            'dob' => $data['dob'],
            'type' => $data['account_Type'],
            'precinctID' => $precinct[0],
            
        ]);
    }
    
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
    
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
    
        $user = $this->create($request->all());
    
        $this->activationService->sendActivationMail($user);
    
        return redirect('/login')->with('status', 'We sent you an activation code. Check your email.');
    }
    
    public function authenticated(Request $request, $user)
    {
        if (!$user->activated) {
            $this->activationService->sendActivationMail($user);
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }
        // if($user->type === 2) {
        //     return redirect()->intended('/');
        // }
        return redirect()->intended($this->redirectPath());
    }
    
    public function activateUser($token)
    {
        if ($user = $this->activationService->activateUser($token)) {
            auth()->login($user);
            return redirect($this->redirectPath());
        }
        abort(404);
    }
    public function redirectPath()
    {
        if (\Auth::user()->type == 1) {
            return "/admin";
            // or return route('routename');
        }
        else if (\Auth::user()->type == 2) {
            return "/manager";
            // or return route('routename');
        }
        return "/user";
        // or return route('routename');
    }
}
