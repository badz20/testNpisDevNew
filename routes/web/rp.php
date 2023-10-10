<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RollingPlan;

Route::group(['middleware' => ['auth']], function () { 

    Route::get('Senarai_Peruntukan', [RollingPlan::class, 'Senarai_Peruntukan'])->name('Senarai_Peruntukan');
    Route::get('rp_bkor', [RollingPlan::class, 'rp_bkor'])->name('rp_bkor');
    Route::get('rp_bkor/{id}/edit', [RollingPlan::class, 'rp_bkor_edit'])->name('rp_bkor.edit');
});