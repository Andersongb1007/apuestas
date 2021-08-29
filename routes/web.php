<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymetController;
use App\Http\Controllers\PaypalController;

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name('inicio');


Route::get('home',[BestController::class,'index'])->name('home.index');
Route::get('home/{best}',[BestController::class,'show'])->name('home.show');
Route::get('home/{sport}',[BestController::class,'sport'])->name('home.sport');

//paypal
Route::get('paymet/paypal/{best}',[PaymentController::class,'index'])->name('paymen.paypal');
Route::get('paypal.success/{details}',[PaymentController::class,'success']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');