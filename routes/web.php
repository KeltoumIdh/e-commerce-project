<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\frontendController;
use App\Http\Controllers\HomeController;

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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Route::get('/', function () {
//     return view('welcome');
// });

//route de la page home
// Route::get('/',[FrontendController::class,'index']);

//la page category
Route::get('/category',[App\Http\Controllers\HomeController::class,'categoryfct']);

//la page de chaque categorie:
Route::get('/view-category/{slug}',[App\Http\Controllers\HomeController::class,'viewcategory']);


Auth::routes();
// route pour l'utilisateur normal 
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// route pour l'admin
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');