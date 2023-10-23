<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ValueManagementController;

//Auth::routes();

Route::group(['middleware' => ['auth']], function () {



        // Route::get('/permohonan-project-dashboard', [ProjectController::class, 'dashboard'])->name('permohonan-project-dashboard');
        Route::get('/permohonan-project-dashboard', [ProjectController::class, 'dashboard'])->name('permohonan-project-dashboard');
        Route::get('/permohonan-project-dashboard2', [ProjectController::class, 'dashboard2'])->name('permohonan-project-dashboard2');
        Route::get('/project-dashboard', [ProjectController::class, 'projectdashboard'])->name('project-dashboard');


        Route::get('/new-parmohonan-project-dashboard', [ProjectController::class, 'newdashboard'])->name('new-parmohonan-project-dashboard');
        Route::get('/ARCGIS', [ProjectController::class, 'ARCGIS'])->name('ARCGIS');
        Route::post('/validationAccessToken', [ProjectController::class, 'validationAccessToken'])->name('validationAccessToken');
        Route::get('/Daftar-Permohonan-Projek', [ProjectController::class, 'daftar'])->name('daftar.permohonan.projek');
        Route::get('/project-application-list', [ProjectController::class, 'index'])->name('projek.list');
        Route::get('/project-list', [ProjectController::class, 'PermohonanProjekList'])->name('Permohonan-Projek-list');
        Route::get('/semak-project-list', [ProjectController::class, 'SemakProjekList'])->name('Semak-Projek-list')->middleware(['can-access-either:permohon_semak-project-list_full,permohon_semak-project-list_view,permohon_semak-project-list_edit']);
        Route::get('/salin-project-list', [ProjectController::class, 'SalinProjekList'])->name('SalinProjekList')->middleware(['can-access-either:permohon_salin-project-list_full,permohon_salin-project-list_view,permohon_salin-project-list_edit']);
        Route::get('/pengesahan-project-list', [ProjectController::class, 'PengesahanProjekList'])->name('PengesahanProjekList')->middleware(['can-access-either:permohon_semak-project-list_full,permohon_semak-project-list_view,permohon_semak-project-list_edit']);
        Route::get('/peraku-project-list', [ProjectController::class, 'PerakuProjekList'])->name('PerakuProjekList')->middleware(['can-access-either:permohon_semak-project-list_full,permohon_semak-project-list_view,permohon_semak-project-list_edit']);

        Route::get('/newpythonscriptfile', [ProjectController::class, 'newpythonscript'])->name('newpythonscriptfile');

        //edit
        Route::get('/project/daftar/{id}/{status}/{user_id}/edit', [ProjectController::class, 'daftarEdit'])->name('daftar.edit');
        //review
        Route::get('/project/daftar/{id}/{status}/{user_id}/review', [ProjectController::class, 'daftarEdit'])->name('daftar.review');



        //sections
        Route::get('/project/section/{id}/{status}/{user_id}/{section}', [ProjectController::class, 'projectSections'])->name('daftar.section');
        Route::get('/KalendarVM', [ProjectController::class, 'KalendarVM'])->name('projek.KalendarVM');

        Route::get('/KalendarVM/{kod}/{type}', [ValueManagementController::class, 'KalendarVM'])->name('projek.KalendarVM');
        // ->middleware(['can-access-either:vm_KalendarVM_edit,vm_KalendarVM_view,vm_KalendarVM_full'])
        Route::get('/senarai_makmal_and_mini', [ValueManagementController::class, 'list'])->name('vm.list')->middleware(['can-access-either:vm_senarai_makmal_and_mini_full,vm_senarai_makmal_and_mini_view,vm_senarai_makmal_and_mini_edit']);
        Route::get('/load_ringkasan/{kod}/{type}', [ValueManagementController::class, 'loadRingkasan'])->name('vm.loadRingkasan');
        Route::get('/maklumat_pelakasanaan_makmal/{kod}/{type}', [ValueManagementController::class, 'maklumatPelakasanaanMakmal'])->name('vm.maklumatPelakasanaanMakmal');
        Route::get('/maklumatPelakasanaanMakmalVR/{kod}/{type}', [ValueManagementController::class, 'maklumatPelakasanaanMakmalVR'])->name('vm.maklumatPelakasanaanMakmalVR');
        Route::get('/maklumatPelakasanaanMakmal_VR/{kod}/{type}', [ValueManagementController::class, 'maklumatPelakasanaanMakmal_VR'])->name('vm.maklumatPelakasanaanMakmal_VR');
        Route::get('/fasilitator', [ValueManagementController::class, 'listFasilitator'])->name('vm.listFasilitator')->middleware(['can-access-either:vm_fasilitator_full,vm_fasilitator_edit,vm_fasilitator_view']);

        Route::get('/senarai_selasai_makmal', [ValueManagementController::class, 'senaraiSelasaiMakmal'])->name('vm.senaraiSelasaiMakmal')->middleware(['can-access-either:vm_senarai_selasai_makmal_full,vm_senarai_selasai_makmal_view,vm_senarai_selasai_makmal_edit']);;
        Route::get('/va_tandatangan/{kod}/{type}', [ValueManagementController::class, 'va_tandatangan'])->name('vm.va_tandatangan');
        Route::get('/penjilidan/{kod}/{type}', [ValueManagementController::class, 'Penjilidan'])->name('vm.penjilidan');
        Route::get('/mini_va_tandatangan/{kod}/{type}', [ValueManagementController::class, 'mini_va_tandatangan'])->name('vm.mini_va_tandatangan');
});
