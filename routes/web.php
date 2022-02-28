<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Wine;
use App\Models\Category;
use App\Models\Country;
use App\Models\Denomination;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::get('/wines', function () {
    return Wine::with('categories')->with('countries')->with('denominations')->get();
});

Route::get('/wines/categories', function () {
    return Wine::with('categories')->get();
});

Route::get('/wines/countries', function () {
    return Wine::with('countries')->get();
});

Route::get('/wines/denominations', function () {
    return Wine::with('denominations')->get();
});

Route::get('/wines/{type}', function ($type) {

    $wines = Wine::type($type)->get();
    return $wines;
});

Route::get('categories', function () {
    return Category::get();
});

Route::get('countries', function () {
    return Country::get();
});

Route::get('denominations', function () {
    return Denomination::get();
});


Route::get('/wine/{id}', function ($id) {
    return Wine::find($id);
});


