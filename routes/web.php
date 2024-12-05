<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});


Route::get('/bookview', function () {
    return view('bookview');
});


// Route::get('/add/books', [HomeController::class, 'addBook'])->name('addBook');
Route::post('/insert_buku', [HomeController::class, 'insert_buku']);
Route::get('/insert_category', [AdminController::class, 'insert_category']);
Route::get('/delete_buku/{id}', [HomeController::class, 'delete_buku']);
Route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);
Route::post('user/{id}/update-status', [HomeController::class, 'updatestatus'])->name('user.updatestatus');
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::post('/edit_buku/{id}', [HomeController::class, 'edit_buku']);
Route::get('/update_buku/{id}', [AdminController::class, 'update_buku']);
Route::get('/edit_category/{id}', [AdminController::class, 'edit_category']);
Route::get('/update_category/{id}', [AdminController::class, 'update_category']);
Route::get('/ajax', [HomeController::class, 'ajax']);
Route::get('/read', [HomeController::class, 'read']);

Route::middleware('only_guest')->group(function () {
    Route::get('login', [HomeController::class, 'login'])->name('login');
    Route::post('login', [HomeController::class, 'authenticating']);
    Route::get('/regis', [HomeController::class, 'regis']);
    Route::post('/regis', [HomeController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [HomeController::class, 'logout']);
    Route::get('/dasboard', [AdminController::class, 'index'])->middleware('auth', 'only_admin');
    Route::get('/profile', [HomeController::class, 'profile'])->middleware('only_client');
    Route::get('books', [HomeController::class, 'index']);
    Route::get('user', [AdminController::class, 'user']);
    Route::get('/data_buku', [AdminController::class, 'showAllData'])->middleware('only_admin');
    Route::get('/category', [AdminController::class, 'category'])->middleware('only_admin');
});
