<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubEventController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PhotoProdukController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\PhotoPortofolioController;

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

Route::get('/', [FrontendController::class, 'index'])->name('landing');
Route::get('/tentang', [FrontendController::class, 'tentang'])->name('tentang');
Route::get('/kritik-saran', [FrontendController::class, 'krisar'])->name('krisar');
Route::post('/kritik-saran', [FrontendController::class, 'krisar_store'])->name('kritiksaran.store');
Route::get('/staff', [FrontendController::class, 'staff'])->name('staffs');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/produk', [FrontendController::class, 'produk'])->name('prod');
Route::get('/produk/{produk}', [FrontendController::class, 'detail_produk'])->name('produk_detail');
Route::get('/blog/{slug}', [FrontendController::class, 'detail_post'])->name('detail_post');
Route::get('/program-kerja', [FrontendController::class, 'proker'])->name('program-kerja');
Route::get('/kalender-program-kerja', [FrontendController::class, 'kalender'])->name('kalender');
Route::get('/program-kerja/{slug}', [FrontendController::class, 'detail_proker'])->name('detail_proker');

Route::get('/portofolio', [FrontendController::class, 'portofolio'])->name('por');
Route::get('/portofolio/{portofolio}', [FrontendController::class, 'detail_portofolio'])->name('portofolio_detail');


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

    Route::resource('category', CategoryController::class);
    Route::get('category/{id}/delete', [CategoryController::class, 'destroy'])->name('hapus.category');

    Route::resource('tag', TagController::class);
    Route::get('tag/{id}/delete', [TagController::class, 'destroy'])->name('hapus.tag');

    Route::resource('post', PostController::class);
    Route::get('post/{id}/delete', [PostController::class, 'destroy'])->name('hapus.post');

    Route::resource('sub_event', SubEventController::class);
    Route::get('sub_event/{id}/delete', [SubEventController::class, 'destroy'])->name('hapus.sub_event');

    Route::resource('produk', ProdukController::class);
    Route::get('produk/{id}/delete', [ProdukController::class, 'destroy'])->name('hapus.produk');

    Route::resource('portofolio', PortofolioController::class);
    Route::get('portofolio/{id}/delete', [PortofolioController::class, 'destroy'])->name('hapus.portofolio');

    Route::get('produk/{id}/foto', [PhotoProdukController::class, 'index'])->name('foto.index');
    Route::post('produk/{id}/foto/store', [PhotoProdukController::class, 'store'])->name('foto.store');
    Route::get('produk/{id}/foto/edit/{foto}', [PhotoProdukController::class, 'edit'])->name('foto.edit');
    Route::put('produk/{id}/foto/update/{foto}', [PhotoProdukController::class, 'update'])->name('foto.update');
    Route::get('produk/{id}/foto/delete/{foto}', [PhotoProdukController::class, 'destroy'])->name('foto.delete');

    Route::get('portofolio/{id}/foto', [PhotoPortofolioController::class, 'index'])->name('foto.portofolio.index');
    Route::post('portofolio/{id}/foto/store', [PhotoPortofolioController::class, 'store'])->name('foto.portofolio.store');
    Route::get('portofolio/{id}/foto/edit/{foto}', [PhotoPortofolioController::class, 'edit'])->name('foto.portofolio.edit');
    Route::put('portofolio/{id}/foto/update/{foto}', [PhotoPortofolioController::class, 'update'])->name('foto.portofolio.update');
    Route::get('portofolio/{id}/foto/delete/{foto}', [PhotoPortofolioController::class, 'destroy'])->name('foto.portofolio.delete');
    
    
});

require __DIR__.'/auth.php';
