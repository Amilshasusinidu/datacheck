<?php

use App\Http\Controllers\DatasetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DatasetController::class, 'index'])
    ->name('datasets.index');

Route::post('/datasets/upload', [DatasetController::class, 'upload'])
    ->name('datasets.upload');
    