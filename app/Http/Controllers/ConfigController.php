<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;

class ConfigController extends Controller
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
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    public function updateavatar(Request $request){
        $user=\Auth::user();
        $image_path = $request->file('imatge');
        
        if ($image_path) {
            
            $path = explode('/',$image_path->store('users'));
            $user->image = end($path);
        }
        $user->update();
        return redirect()->route('config');
        die();
    }
    public function update(Request $request){
        $user=\Auth::user();
        $id=\Auth::user()->id;
        $validate=$this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'nick' => 'required', 'string', 'max:255'.$id,
                'email' => 'required|string|email|max:255|unique:users,email, '.$id
        ]);
        //recollim les dades del formulari 
        $name=$request->input('name');
        $surname=$request->input('surname');
        $nick=$request->input('nick');
        $email=$request->input('email');
        //Assignem els nou valors a l'objecte de l'usuari
        $user->name=$name;
        $user->surname=$surname;
        $user->nick=$nick;
        $user->email=$email;

        $user->update();
        return redirect()->route('config')->with(['message'=>'Usuari correctament editat']);

    }
    
}
