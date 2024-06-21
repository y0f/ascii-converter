<?php

use Illuminate\Support\Facades\Route;
use Y0f\ImageToAscii\Controllers\AsciiController;

Route::get('/ascii-post', [AsciiController::class, 'showForm']);
Route::post('/ascii-image', [AsciiController::class, 'showAsciiImage'])->name('ascii.convert');
