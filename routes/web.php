<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RiwayatPesananController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PesananController;


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
Route::post('/getcart', [CartController::class, 'getCart'])->name('cart.getcart');
Route::post('/cart/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::post('cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::middleware('auth')->group(function () {
    Route::get('/riwayat-pesanan', [RiwayatPesananController::class, 'index'])->name('riwayat.pesanan');
    Route::get('/akun', [AkunController::class, 'index'])->name('akun');
    Route::get('/akun/edit', [AkunController::class, 'edit'])->name('akun.edit');
    Route::post('/order', [PesananController::class, 'order'])->name('transaksi.order');
    Route::post('/addcart', [PesananController::class, 'addToCart'])->name('transaksi.addcart');
    
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::post('admin/products', [AdminController::class, 'addProduct'])->name('admin.addproduct');
    Route::post('admin/products-detail', [AdminController::class, 'getProductData'])->name('admin.getproductdata');
    Route::post('admin/products-d', [AdminController::class, 'deleteProduct'])->name('admin.deleteproduct');
    Route::post('admin/products-u', [AdminController::class, 'updateProduct'])->name('admin.updateproduct');
    Route::get('admin/transaksi', [PesananController::class, 'pembelian'])->name('admin.transaksi');
    Route::post('admin/transaksi', [PesananController::class, 'process'])->name('admin.prosestransaksi');
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.db');
    Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('admin/dashmain', [AdminController::class, 'mainView'])->name('admin.mainView');
});

Route::get('admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
