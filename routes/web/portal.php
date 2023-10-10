<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterPortalController;

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/master/portal', [MasterPortalController::class, 'index'])->name('master.portal.index');
});

