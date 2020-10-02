<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\APIContrtoller;

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

Route::get('/', [TaskController::class , 'index']);
Route::post('create-offer', [TaskController::class , 'saveOffer'])->name('save.offer');
Route::get('new-recipient', [TaskController::class , 'createRecipient'])->name('recipient');
Route::post('save-recipient', [TaskController::class , 'saveRecipient'])->name('save.recipient');
Route::get('verify', [TaskController::class , 'verifyVoucher']);
Route::post('verify-voucher' , [APIContrtoller::class , 'validateVoucher'])->name('validate');
