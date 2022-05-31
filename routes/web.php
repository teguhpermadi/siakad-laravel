<?php

use App\Http\Controllers\PtkController;
use Illuminate\Support\Facades\Route;
use Laravolt\Indonesia\Models\Village;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/ptk/data', [PtkController::class, 'getData']);
Route::resource('/ptk', PtkController::class);

Route::get('tes', function(){
    return view('pages.home');
})->middleware(['auth','userActive']);
