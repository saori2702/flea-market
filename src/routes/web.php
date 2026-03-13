<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MylistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SellController;

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

Route::get('/', [ItemController::class, 'index'])->name('item.index');
Route::get('/item/{item_id}', [ItemController::class, 'show'])->name('item.show');

Route::middleware('auth')->group(function () {

Route::post('/like/{item_id}', [ItemController::class, 'like'])->name('like.store');
Route::delete('/like/{item_id}', [ItemController::class, 'unlike'])->name('like.destroy');

Route::post('/comment/{item_id}', [ItemController::class, 'comment'])->name('comment.store');

Route::get('/?tab=mylist', [MylistController::class, 'index'])->name('mylist.index');

Route::get('/mypage', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/mypage/profile',[ProfileController::class,'edit'])->name('profile.edit');
Route::post('/mypage/profile',[ProfileController::class,'update'])->name('profile.update');

Route::get('/purchase/{item_id}', [PurchaseController::class, 'show'])->name('purchase.show');
Route::post('/purchase/{item_id}', [PurchaseController::class, 'store'])->name('purchase.store');

Route::get('/purchase/address/{item_id}', [PurchaseController::class, 'editAddress'])->name('address.edit');
Route::post('/purchase/address/{item_id}', [PurchaseController::class, 'updateAddress'])->name('address.update');

Route::get('/sell', [SellController::class, 'show'])->name('sell.show');
Route::post('/sell', [SellController::class, 'store'])->name('sell.store');

});
