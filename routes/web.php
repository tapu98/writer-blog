<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebsiteController;
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

// Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/update', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

//blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');


Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');

Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blog/update', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

Route::get('/email', [BlogController::class, 'email'])->name('blog.email');

//frontend
Route::get('/index', [WebsiteController::class, 'index'])->name('website.index');
Route::get('/about', [WebsiteController::class, 'about'])->name('website.about');
Route::get('/post', [WebsiteController::class, 'post'])->name('website.post');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('website.contact');


