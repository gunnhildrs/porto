<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

// Tidak ada database di aplikasi ini — controller hanya
// mengoper array PHP statis ke view.
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
