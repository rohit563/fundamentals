<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function a_general_register()
    {
        $user = factory(App/User::class)->create([
            'name' => 'Johnny Test',
            'email' => 'testing84@gmail.com',
            'password' => bcrypt('tester'),
            'username' => 'Testy24R',
            'passport' => '321348535155',
            'gender' => 'Male',
            'address1' => '304 Grand Ave',
            'city' => 'Iowa City',
            'state' => 'Iowa',
            'zip' => '52242',
            'dob'=> '1995-12-25',
            'type' => 3
        ]);
        
        $this->visit(route('register'))
             ->type($user->name, 'Name')
             ->type($user->email, 'Email')
             ->type('tester', 'Password')
             ->type('tester', 'Confirm Password')
             ->type($user->username, 'Username')
             ->type($user->passport, 'Passport')
             ->type($user->address1, 'Address1')
             ->type($user->city, 'City')
             ->type($user->state, 'State')
             ->type($user->zip, 'Zip')
             ->type($user->dob, 'DOB')
             ->select(1,'Gender')
             ->select(3,'Type')
             ->press('Register')
             ->see('We sent you an activation code. Check your email')
             ->onPage('/login');
    }
    
        public function manager_register()
    {
        $user = factory(App/User::class)->create([
            'name' => 'Johnny Test',
            'email' => 'testing84@gmail.com',
            'password' => bcrypt('tester'),
            'username' => 'Testy24R',
            'passport' => '321348535155',
            'gender' => 'Male',
            'address1' => '304 Grand Ave',
            'city' => 'Iowa City',
            'state' => 'Iowa',
            'zip' => '52242',
            'dob'=> '1995-12-25',
            'type' => 2
        ]);
        
        $this->visit(route('register'))
             ->type($user->name, 'Name')
             ->type($user->email, 'Email')
             ->type('tester', 'Password')
             ->type('tester', 'Confirm Password')
             ->type($user->username, 'Username')
             ->type($user->passport, 'Passport')
             ->type($user->address1, 'Address1')
             ->type($user->city, 'City')
             ->type($user->state, 'State')
             ->type($user->zip, 'Zip')
             ->type($user->dob, 'DOB')
             ->select(1,'Gender')
             ->select(2,'Type')
             ->type(55555,'Manager Code')
             ->press('Register')
             ->see('We sent you an activation code. Check your email')
             ->onPage('/login');
    }
}
