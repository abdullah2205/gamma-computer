<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]); //ini

Route::livewire('/', 'home')->name('home'); // untuk pemanggilan {{ route }}
Route::livewire('/products', 'product-index')->name('products'); // untuk pemanggilan {{ products }}
Route::livewire('/products/brand/{brandId}', 'product-brand')->name('products.brand'); // untuk pemanggilan {{ products-brand }}
Route::livewire('/products/{id}', 'product-detail')->name('products.detail'); // untuk pemanggilan {{ products-detail }}
Route::livewire('/cart', 'cart')->middleware('verified')->name('cart'); //untuk pemanggilan {{ keranjang }}
Route::livewire('/checkout', 'checkout')->name('checkout'); //untuk pemanggilan {{ checkout }}
Route::livewire('/history', 'history')->middleware('verified')->name('history'); //untuk pemanggilan {{ history }}

//route dashboard untuk admin
Route::middleware('role:admin')
    ->get('/dashboard', function() {
        return view('admin/dashboard'); 
    })
    ->name('dashboard');

Route::middleware('role:admin')->resource('dashboard/products', 'ProductController'); //route products untuk admin
Route::middleware('role:admin')->resource('dashboard/brands', 'BrandController'); //route brands untuk admin
Route::middleware('role:admin')->resource('dashboard/pesanans', 'PesanansController');
Route::middleware('role:admin')->resource('dashboard/pesanan_details', 'PesananDetailsController');