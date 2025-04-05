<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::post('images/upload', [ImageController::class, 'uploadImage'])->name('images.upload');
Route::get('images', [ImageController::class, 'getImages'])->name('images.index');