<?php

use Kenura\Mardock\Controllers\MarkdownController;
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

Route::get(config('markdown.route'), [MarkdownController::class, 'index'])->name('markdown.index');

Route::get('markdowns/{markdown}', [MarkdownController::class, 'show'])->name('markdown.show');
