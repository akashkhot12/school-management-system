<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
         return view('homepage');
     });

     Route::get('/courses', function () {
        return view('courses');
    });
    Route::get('/merit', function () {
        return view('merit');
    });
    Route::get('/history', function () {
        return view('history');
    });
    Route::get('/school', function () {
        return view('school');
    });

Route::get('/index',[StudentController::class,'index'])->name('index');
Route::get('/edit/{id}',[StudentController::class,'edit'])->name('edit');
Route::get('/show/{id}',[StudentController::class,'show'])->name('show');
Route::get('/create',[StudentController::class,'create'])->name('create');
Route::post('/store',[StudentController::class,'store'])->name('store');
Route::post('/update/{id}',[StudentController::class,'update'])->name('update');
Route::get('delete/{id}',[StudentController::class,'delete'])->name('destroy');





