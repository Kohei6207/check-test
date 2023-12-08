<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/create', [ContactController::class, 'create'])->name('contacts.create');
Route::get('/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm');
Route::post('/store', [ContactController::class, 'store'])->name('contacts.store');

//検索画面
Route::get('/stock', [ContactController::class, 'stock'])->name('contacts.stock');
Route::delete('stock/delete/{id}', [ContactController::class, 'delete'])->name('contacts.delete');