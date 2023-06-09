<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RiwayatPesananController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\RegisterController;


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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::middleware('auth')->group(function () {
    Route::get('/riwayat-pesanan', [RiwayatPesananController::class, 'index'])->name('riwayat.pesanan');
    Route::get('/akun', [AkunController::class, 'index'])->name('akun');
    Route::get('/akun/edit', [AkunController::class, 'edit'])->name('akun.edit');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::get('admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');