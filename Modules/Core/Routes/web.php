<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\app\Http\Controllers\CoreController;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Core::Home');
})->name('home');

Route::get('/about', function () {
    return Inertia::render('Core::About');
})->name('about');


Route::get('/core', function () {
    return Inertia::render('Core::Nested/Core');
})->name('core');