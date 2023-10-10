<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerundingController;

//Auth::routes();

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/senarai_perunding_jps', [PerundingController::class, 'senaraiJps'])->name('senarai-perunding-jps');
    Route::get('/senarai_perunding_bukan_jps', [PerundingController::class, 'senaraiBukanJps'])->name('senarai-perunding-bukan-jps');
    Route::get('/maklumat_perunding_jps/{project_id}/{perolehan_id}', [PerundingController::class, 'maklumatPerunding'])->name('perunding.load.maklumat.perunding');
    Route::get('/penilaian/{project_id}/{perolehan_id}', [PerundingController::class, 'penilaianPerunding'])->name('perunding.load.penilaian.perunding');
    Route::get('/prestasi/{project_id}/{perolehan_id}', [PerundingController::class, 'prestasiPerunding'])->name('perunding.load.prestasi.perunding');
    Route::get('/kewangan/{project_id}/{perolehan_id}', [PerundingController::class, 'kewangan'])->name('kewangan');
    Route::get('/kewangan/unjuran/{project_id}/{perolehan_id}', [PerundingController::class, 'unjuran'])->name('perunding.unjuran');
    Route::get('/kewangan/yuran-perunding/{project_id}/{perolehan_id}', [PerundingController::class, 'YuranPerunding'])->name('perunding.YuranPerunding');
    Route::get('/kewangan/lejar-bayaran/{project_id}/{perolehan_id}', [PerundingController::class, 'lejarBayaran'])->name('perunding.lejarBayaran');
    Route::get('/kewangan/borang-jps/{project_id}/{perolehan_id}', [PerundingController::class, 'borangJps'])->name('perunding.borangJps');
    Route::get('/kewangan/imbuhan-balik/{project_id}/{perolehan_id}', [PerundingController::class, 'imbuhanBalik'])->name('perunding.imbuhanBalik');

});