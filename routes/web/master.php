<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;

//Auth::routes();

Route::group(['middleware' => ['auth']], function () {  
    Route::get('/master', [MasterController::class, 'index'])->name('master.index');
    Route::get('/Negeri', [MasterController::class, 'negeri'])->name('master.negeri');
    Route::get('/{negeri}/Daerah', [MasterController::class, 'daerah'])->name('master.daerah');
    Route::get('/Daerah', [MasterController::class, 'daerahAll'])->name('master.daerah.all');
    Route::get('/{daerah}/Parlimen', [MasterController::class, 'parliment'])->name('master.parliment');
    Route::get('/{daerah}/Mukim', [MasterController::class, 'mukim'])->name('master.mukim');
    Route::get('/Mukim', [MasterController::class, 'mukimAll'])->name('master.mukim.all');
    Route::get('/Parlimen', [MasterController::class, 'parlimentAll'])->name('master.parliment.all');
    Route::get('/{parlimen}/Dun', [MasterController::class, 'dun'])->name('master.dun');
    Route::get('/Dun', [MasterController::class, 'dunAll'])->name('master.dun.all');

    Route::get('/Kementerian', [MasterController::class, 'kementerian'])->name('master.kementerian');
    Route::get('/Gred', [MasterController::class, 'gred'])->name('master.gred');

    Route::get('/{jabatan}/Bahagian', [MasterController::class, 'bahagian'])->name('master.bahagian');
    Route::get('/Bahagian', [MasterController::class, 'bahagianAll'])->name('master.bahagian.all');

    Route::get('/{kementerian}/Jabatan', [MasterController::class, 'jabatan'])->name('master.jabatan');
    Route::get('/Jabatan', [MasterController::class, 'jabatanAll'])->name('master.jabatan.all');

    Route::get('/Jawatan', [MasterController::class, 'jawatan'])->name('master.jawatan');

    Route::get('/RMK', [MasterController::class, 'rmk'])->name('master.rmk');
    Route::get('/OBB', [MasterController::class, 'obb'])->name('master.obb');
    Route::get('/Unit', [MasterController::class, 'unit'])->name('master.unit');
    Route::get('/Komponen', [MasterController::class, 'komponen'])->name('master.komponen');
    Route::get('/PejabatProjek', [MasterController::class, 'pejabatprojek'])->name('master.pejabatprojek');
    Route::get('/SkopKosCalculation', [MasterController::class, 'skopkoscalculation'])->name('master.skopkoscalculation');


    Route::get('/BahagianEPU', [MasterController::class, 'bahagianEpu'])->name('master.bahagianEpu');
    Route::get('/SektorUtama', [MasterController::class, 'sektorUtamaAll'])->name('master.sektor.utama.all');
    Route::get('/{BahagianEPU}/SektorUtama', [MasterController::class, 'sektorUtama'])->name('master.sektor.utama');
    Route::get('/Sektor', [MasterController::class, 'sektorAll'])->name('master.sektor.all');
    Route::get('/{SektorUtama}/Sektor', [MasterController::class, 'sektor'])->name('master.sektor');
    Route::get('/SubSektor', [MasterController::class, 'subSektorAll'])->name('master.sektor.sub.all');
    Route::get('/{Sektor}/SubSektor', [MasterController::class, 'subSektor'])->name('master.sektor.sub');

    
    Route::get('/sdgmaster', [MasterController::class, 'sdgmaster'])->name('master.sdgmaster');
    Route::get('/sasaran', [MasterController::class, 'sasaran'])->name('master.sasaran');
    Route::get('/{id}/sasaran', [MasterController::class, 'sasaranid'])->name('master.sasaran');
    Route::get('/Indikator', [MasterController::class, 'Indikator'])->name('master.Indikator');
    Route::get('/{id}/Indikator', [MasterController::class, 'Indikatorid'])->name('master.Indikator');

    Route::get('/Kategori', [MasterController::class, 'kategori'])->name('master.kategori');
    Route::get('/SubKategori', [MasterController::class, 'subKategoriAll'])->name('master.sub.kategori.all');
    Route::get('/{Kategori}/SubKategori', [MasterController::class, 'subKategori'])->name('master.sub.kategori');

    Route::get('/Skops', [MasterController::class, 'skops'])->name('master.skops');
    Route::get('/SubSkop', [MasterController::class, 'subSkopAll'])->name('master.sub.skop.all');
    Route::get('/{Skop}/SubSkop', [MasterController::class, 'subSkop'])->name('master.sub.skop');

    Route::get('/Strategi', [MasterController::class, 'Strategi'])->name('master.Strategi');
    

    Route::get('/lookup_options', [MasterController::class, 'options'])->name('master.lookup.options');

    Route::get('/Role', [MasterController::class, 'roles'])->name('master.role');
    Route::get('/Permissions', [MasterController::class, 'permissions'])->name('master.permissions');
    Route::get('/UserType', [MasterController::class, 'UserTypes'])->name('master.user.type');
    Route::get('/Module', [MasterController::class, 'Module'])->name('master.module');

    Route::get('/role_permission/{id}/{name}', [MasterController::class, 'RolePermission'])->name('master.RolePermission');

    Route::get('/DeliverableHeadings', [MasterController::class, 'deliverableHeadingAll'])->name('master.deliverable.heading.all');
    Route::get('/{heading}/Deliverables', [MasterController::class, 'deliverable'])->name('master.Deliverables');
    Route::get('/Deliverables', [MasterController::class, 'deliverableAll'])->name('master.Deliverables.all');

    Route::get('/Belanja_mengurus_skop', [MasterController::class, 'Belanja_mengurus_skop'])->name('master.Belanja_mengurus_skop');
    Route::get('/Belanja_mengurus_subskop', [MasterController::class, 'Belanja_mengurus_subskop'])->name('master.Belanja_mengurus_subskop');

    Route::get('/Nama_Agensi', [MasterController::class, 'Nama_Agensi'])->name('master.Nama_Agensi');

});

