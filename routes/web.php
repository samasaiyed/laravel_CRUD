<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productcontroller;  // added

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

Route::get('/',[productcontroller::class,'index'])->name('products.index'); // route::get('/',controllername::class,'mathodname')->name('route name');
Route::get('products/create',[productcontroller::class,'create'])->name('products.create');
Route::post('products/store',[productcontroller::class,'store'])->name('products.store'); // post (from method is post)

Route::get('products/{id}/edit',[productcontroller::class,'edit']);
Route::put('products/{id}/update',[productcontroller::class,'update']);
Route::get('products/{id}/delete',[productcontroller::class,'delete']);