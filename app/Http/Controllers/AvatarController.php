<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PujarPostController extends Controller
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
    
    public function pujarpost(){
        $user= \Auth::user();
        $id= \Auth::user()->id;
        $image = Image::create();

        $validate = $this->validate($request,[
            'image_path' => ['required'],
            'desc' => ['string', 'max:255'],
        ]);

        $desc= $request->input('desc');
        $image_path = $request->file('image_path');

        $imagename =  time()."".$image_path->getClientOriginalName();

        // var_dump($image_name);
        // die();


        if($image_path){
            \Storage::disk('images')->put($image_name,  \File::get($image_path));
            // $path = $image_path->store('users');
            $image->image_path=$image_name;
        }


        $image->description=$desc;
        $image->user_id=$id;

        $image->update();
        return redirect()->route('upload_image')
            ->with(['message'=>'Imatge pujada correctament']);

    }
    
}
