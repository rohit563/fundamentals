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
            'passport' => '',
            'gender' => 'Male',
            'address1' => '304 Grand Ave',
            'city' => 'Iowa City',
            'state' => 'Iowa',
            'zip' => '52242',
            'dob'=> '1995-19-25'
        ]);
        
        $this->visit(route('register'))
             ->type($user->name, 'name')
             ->type($user->email, 'email')
             ->type('tester', 'password')
             ->type($user->username, 'username')
             ->type($user->passport, 'passport')
             ->type($user->name, 'name')
             ->type($user->name, 'name')
             ->onPage('/login');
            
            
    }
}
