<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //
    use RegistersUsers;
    /**
     * Where to redirect users after registration
     * @var string
     *  */ 
    protected $redirectTo=RouteServiceProvider::HOME;
    /**
     * Create a new controller instance
     * @return void
     * 
     */
    public function __construct()
    {
        $this-middleware('guest');

    }
    /**
     * Get a validator for an incoming registration request.
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array)

}
