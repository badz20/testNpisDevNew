<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NOC_Controller;



Route::get('/Kertas_Permohonan_NOC', [NOC_Controller::class, 'index'])->name('Kertas_Permohonan_NOC');
Route::get('/notis_perubahan', [NOC_Controller::class, 'notis_perubahan'])->name('notis_perubahan');
Route::get('/notis_perubahan_negeri', [NOC_Controller::class, 'notis_perubahan_negeri'])->name('notis_perubahan');
Route::get('/notis_perubahan/{kod}', [NOC_Controller::class, 'nocPageData'])->name('notis_perubahan');
Route::get('/kementerian-noc/{id}', [NOC_Controller::class, 'nocKementerian'])->name('nocKementerian');
Route::get('/peruntukan_siling_tahunan', [NOC_Controller::class, 'PeruntukanTahunan'])->name('PeruntukanTahunan');

Route::get('/senerai_noc/{id}',[NOC_Controller::class, 'seneraiNoc'])->name('noc.seneraiNoc');
Route::get('/load_projeck/{id}',[NOC_Controller::class, 'loadProjeck'])->name('noc.loadProjeck');
Route::get('/load_kementerian_silling/{id}',[NOC_Controller::class, 'loadKementerianSilling'])->name('noc.loadKementerianSilling');

Route::get('/add-notis_perubahan', [NOC_Controller::class, 'addnotisPerubahan'])->name('addnotisPerubahan');


