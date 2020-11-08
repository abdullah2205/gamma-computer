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

Auth::routes();

Route::livewire('/', 'home')->name('home'); // untuk pemanggilan {{ route }}
Route::livewire('/products', 'product-index')->name('products'); // untuk pemanggilan {{ products }}
Route::livewire('/products/brand/{brandId}', 'product-brand')->name('products.brand'); // untuk pemanggilan {{ products-brand }}
Route::livewire('/products/{id}', 'product-detail')->name('products.detail'); // untuk pemanggilan {{ products-detail }}
Route::livewire('/cart', 'cart')->name('cart'); //untuk pemanggilan {{ keranjang }}
Route::livewire('/checkout', 'checkout')->name('checkout'); //untuk pemanggilan {{ checkout }}
Route::livewire('/history', 'history')->name('history'); //untuk pemanggilan {{ history }}