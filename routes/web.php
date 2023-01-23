<?php

use App\Http\Controllers\Admin\DashboarCcontroller;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Admin\projectController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [PageController::class, 'index'])->name('home');



Route::middleware(['auth', 'verified'])
    ->name('admin.karim')
    ->prefix('admin')
    ->group(function () {
        //QUI METTIAMO TUTTE LE ROTTE DELLA CRUD
        Route::get('/', [DashboarCcontroller::class, 'index'])->name('dashboard');
        Route::resource('project', projectController::class);
    });




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
