<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\NatierController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});
*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/quienes-somos', [PageController::class, 'about'])->name('about');
Route::get('/catalogo', [PageController::class, 'catalogo'])->name('brands');
Route::get('/contacto', [PageController::class, 'contact'])->name('contact');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/natier', [NatierController::class, 'index'])->name('natier');
Route::get('/brands/{brand?}', [BrandController::class, 'show'])->name('brands');

Route::get('/catalogo', [ProductoController::class, 'catalogo'])->name('catalogo');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/shop', [ProductoController::class, 'index'])->name('shop');





Auth::routes();




