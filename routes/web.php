<?php

use App\Http\Controllers\RoseFinderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RoseFinderController::class, 'index'])->name('rose-finder');
