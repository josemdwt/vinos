<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\WineController;
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

Route::controller(WineController::class)->prefix('wines')->group(function () {
    Route::get('/', 'index');
    Route::get('/categories', 'categories');
    Route::get('/countries', 'countries');
    Route::get('/denominations', 'denominations');
    Route::get('/{id}', 'show');

});

Route::get('countries', [CountryController::class,'index' ]);

Route::get('/wines/{type}', function ($type) {

    $wines = Wine::type($type)->get();
    return $wines;
});

Route::get('categories', function () {
    return Category::orderBy('id', 'desc')->get();
});


Route::get('denominations', function () {
    return Denomination::select('name')->get();
});


