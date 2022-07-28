<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
   
    public function up(){
        echo "ola";
    }
    public function update(Request $request){
        $user=\Auth::user();
        $id=\Auth::user()->id;
        // $validate=$this->validate($request,[
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'passwordconfirm' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
        //recollim les dades del formulari 
        $password=$request->input('password');
        $passwordconfirm=$request->input('passwordconfirm');
        
        //Assignem els nou valors a l'objecte de l'usuari
        $user->password=Hash::make($password);


        $user->update();
        return redirect()->route('config')->with(['message'=>'Usuari correctament editat']);

    }
}
