<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;

Route::prefix('company')->group(function () {
    Route::get('/', [CompanyController::class, 'index']); 
    Route::post('/', [CompanyController::class, 'store']);
    Route::get('{nit}', [CompanyController::class, 'show']);
    Route::match(['put', 'patch'], '{id}', [CompanyController::class, 'update']);
    Route::delete('{id}', [CompanyController::class, 'destroy']);
});