<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProkerController;

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

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function(){
    Route::get('/dashboard', function () {
        return view('admin');
    })->name('dashboard');

    Route::resource('divisi', DivisiController::class);
    Route::get('divisi/{id}/delete', [DivisiController::class, 'destroy'])->name('hapus.divisi');

    Route::resource('staff', StaffController::class);
    Route::get('staff/{id}/delete', [StaffController::class, 'destroy'])->name('hapus.staff');

    Route::resource('proker', ProkerController::class);
    Route::get('proker/{id}/delete', [ProkerController::class, 'destroy'])->name('hapus.proker');
    
});

require __DIR__.'/auth.php';
