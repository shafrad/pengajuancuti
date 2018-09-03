<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Hotel;
use View;
use Session;
use Redirect;
use Auth;

class HomeController extends Controller
{
    public function showLogin()
    {
        // show the form
        return View::make('login');
    }

    public function doLogin()
    {
    // process the form
    $rules = array(
        'email'    => 'required|email', // make sure the email is an actual email
        'password' => 'required|min:3' // password can only be alphanumeric and has to be greater than 3 characters
    );
    
    // run the validation rules on the inputs from the form
    $validator = Validator::make(Input::all(), $rules);
    
    // if the validator fails, redirect back to the form
    if ($validator->fails()) {
        return Redirect::to('login')
            ->withErrors($validator) // send back all errors to the login form
            ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    } else {
    
        // create our user data for the authentication
        $userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );
    
        // attempt to do the login
        if (Auth::attempt($userdata)) {
    
            // validation successful!
            // redirect them to the secure section or whatever
            return redirect()->route('cutis.index');
            // return Redirect::to('cutis/index');
            // for now we'll just echo success (even though echoing in a controller is bad)
            // echo 'SUCCESS!';
    
        } else {        
    
            // validation not successful, send back to form 
            return Redirect::to('login');
    
        }
    
    }
    }

    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('login'); // redirect the user to the login screen
    }

}
