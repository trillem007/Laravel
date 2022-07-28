<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;

use Illuminate\Pagination\Paginator;
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
    
    public function updatepost(Request $request){
        $user= \Auth::user();
        $id= \Auth::user()->id;
        $image = Image::create();

        $validate = $this->validate($request,[
            'imatge' => ['required'],
            'descripcio' => [ 'max:255'],
        ]);

        $desc= $request->input('descripcio');
        $image_path = $request->file('imatge');

        $image_name =  time()."".$image_path->getClientOriginalName();

        // var_dump($image_name);
        // die();


        if($image_path){
            \Storage::disk('posts')->put($image_name,  \File::get($image_path));
            // $path = $image_path->store('users');
            $image->image_path=$image_name;
        }


        $image->description=$desc;
        $image->user_id=$id;

        $image->update();

        return redirect()->route('config')
            ->with(['message'=>'Imatge pujada correctament']);
    }
    public function getPosts(){
        $data = Image::paginate(5);
        // $images = Image::all();
        return view('home',compact('data'));
    }
    public function getImage($filename){
        $file = Storage::disk('posts')->get($filename);
        return response($file,200);
    }
    public function getImageAvatar($filename){

        $file = Storage::disk('users')->get($filename);
        return response($file,200);
    }
    public function getPost($filename){
        // $file = Storage::disk('posts')->get($filename);
        foreach(Image::all() as $image){
            if($image->image_path==$filename){
                return view('postindividual',compact('image'),['im'=>$image,'file'=>$filename]);
            }
        }
    }
    public function afegircomentari(Request $request){
        $user= \Auth::user();
        $id= \Auth::user()->id;
        $comentari = $request->input('comentari');
        $id_image = $request->imatgeid;

        $comment1= Comment::create();
        $comment1->content=$comentari;
        $validate = $this->validate($request,[
            'comentari' => ['required', 'string', 'max:255'],
        ]);


        $comment1->user_id=$id;
        $comment1->image_id=$id_image;
        $comment1->update();
        
        return redirect()->back()
            ->with(['message'=>'Comentari publicat correctament']);
    }      
    public function borrarcomentari($comentari){
        $user= \Auth::user();
        $id= \Auth::user()->id;

       
        // $validate = $this->validate($request,[
        //     'comentari' => ['required', 'string', 'max:255'],
        // ]);

        foreach(Comment::all() as $comment){
            // $comment1->update();

            if($comment->id==$comentari){
                
                $comment->delete();
                
            }
        }

        echo($comentari);
        return redirect()->back()
            ->with(['message'=>'Imatge pujada correctament']);

        // $comment1->user_id=$id;
        // $comment1->image_id=$id_image;
        
        
    }                      
    
}
