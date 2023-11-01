<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthorController;
use \App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('author')->name('author.')->group(function(){

    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login', 'backend.pages.auth.login')->name('login'); 
        Route::view('/forget-password', 'backend.pages.auth.forget')->name('forget-password'); 

    });

    Route::middleware([])->group(function(){
        Route::get('/home', [AuthorController::class, 'index'])->name('home');
    });   

});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

Route::get('/home', [HomeController::class, 'index']);

