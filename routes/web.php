
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FruitaController;
use App\Http\Controllers\ConfigController;
use App\Models\Image;

// use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::group([  'middleware' => 'auth'], function()
{
    Route::get('/', [App\Http\Controllers\PujarPostController::class, 'getPosts'])->name('home');

    Route::post('/update', [App\Http\Controllers\ConfigController::class, 'update'])->name('update');
    Route::post('/updateavatar', [App\Http\Controllers\ConfigController::class, 'updateavatar'])->name('updateavatar');
    Route::post('/updatepost', [App\Http\Controllers\PujarPostController::class, 'updatepost'])->name('updatepost');
    Route::post('/afegircomentari', [App\Http\Controllers\PujarPostController::class, 'afegircomentari'])->name('afegircomentari');
    Route::get('/borrarcomentari/{comentari}', [App\Http\Controllers\PujarPostController::class, 'borrarcomentari'])->name('borrarcomentari');
        
    Route::get('/post/{filename}', [App\Http\Controllers\PujarPostController::class, 'getImage'])->name('user.post');
    Route::get('/getpost/{filename}', [App\Http\Controllers\PujarPostController::class, 'getPost'])->name('get.post');
    Route::get('/avatar/{filename}', [App\Http\Controllers\PujarPostController::class, 'getImageAvatar'])->name('user.avatar');
    Route::get('/config', function () {
        return view("config");
    })->name('config');
    Route::get('/DetailPost', function () {
        return view("postindividual");
    })->name('postindividual');
    Route::get('/pujarpost', function () {
        return view("pujarpost");
    })->name('pujarpost');
    Route::get('/canviaravatar', function () {
        return view("canviaravatar");
    })->name('canviaravatar');
    Route::get('/password', function () {
        return view("password");
    })->name('password');
    });
    Route::post('/updatepassword', [App\Http\Controllers\PasswordController::class, 'update'])->name('updatepassword');


// Route::post('/canviaravatar', [App\Http\Controllers\ChangeAvatarController::class, 'update'])->name('updatepassword');


