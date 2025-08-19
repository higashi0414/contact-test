<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExportController;

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.index');

Route::resource('contacts', ContactController::class)->only(['destroy']);

Route::get('/', [ContactController::class, 'form'])->name('contacts.form');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks');

Route::get('/contacts/export', [ExportController::class, 'export'])->name('contacts.export');






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

