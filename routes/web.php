<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ParsePdf;
use App\Http\Controllers\ParseText0100;
use App\Http\Controllers\ParseText0101;
use App\Http\Controllers\ParseText0200;
use App\Http\Controllers\ParseText0600;
use App\Http\Controllers\ViewController;

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

Route::get('/',[ViewController::class,'welcome'])->name('welcome');

// Route::resource('pdf', ParsePdf::class);
// Route::resource('text', ParseText::class);
Route::prefix('text')->group(function () {
    Route::get('/',[ViewController::class,'textMenu'])->name('menu-text');

    Route::prefix('/0100')->group(function () {
        Route::get('/', [ParseText0100::class,'index'])->name('parse-0100');
        Route::post('/', [ParseText0100::class,'store'])->name('post.0100');
        Route::post('/download', [ParseText0100::class, 'download'])->name('downloadFile0100');
    });

    Route::prefix('/0200')->group(function () {
        Route::get('/', [ParseText0200::class,'index'])->name('parse-0200');
        Route::post('/', [ParseText0200::class,'store'])->name('post.0200');
        Route::post('/download', [ParseText0200::class, 'download'])->name('downloadFile0200');
    });

    Route::prefix('/0101')->group(function () {
        Route::get('/', [ParseText0101::class,'index'])->name('parse-0101');
        Route::post('/', [ParseText0101::class,'store'])->name('post.0101');
        Route::post('/download', [ParseText0101::class, 'download'])->name('downloadFile0101');
    });

    Route::prefix('/lainnya')->group(function () {
        Route::get('/', [ParseText0600::class,'index'])->name('parse-lainnya');
        Route::post('/', [ParseText0600::class,'store'])->name('post.lainnya');
        Route::post('/download', [ParseText0600::class, 'download'])->name('downloadFileLainnya');
    });
});
