<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MydataController;

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
Route::get('myform',[MydataController::class,'index'])->name('index');
Route::post('generatenumber',[MydataController::class,'generate']);
Route::get('showdata',[MydataController::class,'show']);
