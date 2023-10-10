<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerundingController extends Controller
{
    //
    public function senaraiJps(){
        
        $viewOnly = false;
        // if ($user_new->hasAnyDirectPermission(['vm_senarai_selasai_makmal_edit','vm_senarai_selasai_makmal_full'])) {
        //     $viewOnly = false;
        // }

        return view('perunding.senaraiJps.senaraiJps',['viewOnly'=>$viewOnly]);
    }

    public function senaraiBukanJps(){
        
        $viewOnly = false;
        // if ($user_new->hasAnyDirectPermission(['vm_senarai_selasai_makmal_edit','vm_senarai_selasai_makmal_full'])) {
        //     $viewOnly = false;
        // }

        return view('perunding.senaraiBukanTeknik.senaraiJps',['viewOnly'=>$viewOnly]);
    }

    public function maklumatPerunding($project_id,$perolehan_id){
        
        $viewOnly = false;
        // if ($user_new->hasAnyDirectPermission(['vm_senarai_selasai_makmal_edit','vm_senarai_selasai_makmal_full'])) {
        //     $viewOnly = false;
        // }

        return view('perunding.maklumatPerunding.maklumat_perunding',['viewOnly'=>$viewOnly,'project_id'=>$project_id,'perolehan_id'=>$perolehan_id]);
    }

    public function penilaianPerunding($project_id,$perolehan_id){
        
        $viewOnly = false;
        // if ($user_new->hasAnyDirectPermission(['vm_senarai_selasai_makmal_edit','vm_senarai_selasai_makmal_full'])) {
        //     $viewOnly = false;
        // }

        return view('perunding.penilaian.penilaian',['viewOnly'=>$viewOnly,'project_id'=>$project_id,'perolehan_id'=>$perolehan_id]);
    }

    public function prestasiPerunding($project_id,$perolehan_id){
        
        $viewOnly = false;
        // if ($user_new->hasAnyDirectPermission(['vm_senarai_selasai_makmal_edit','vm_senarai_selasai_makmal_full'])) {
        //     $viewOnly = false;
        // }

        return view('perunding.prestasi.prestasi',['viewOnly'=>$viewOnly,'project_id'=>$project_id,'perolehan_id'=>$perolehan_id]);
    }

    public function kewangan($project_id,$perolehan_id){
        
        $viewOnly = false;
        // if ($user_new->hasAnyDirectPermission(['vm_senarai_selasai_makmal_edit','vm_senarai_selasai_makmal_full'])) {
        //     $viewOnly = false;
        // }

        return view('perunding.kewangan.rekod_bayaran.rekod_bayaran',['viewOnly'=>$viewOnly,'project_id'=>$project_id,'perolehan_id'=>$perolehan_id]);
    }

    public function unjuran($project_id,$perolehan_id){
        
        $viewOnly = false;
        // if ($user_new->hasAnyDirectPermission(['vm_senarai_selasai_makmal_edit','vm_senarai_selasai_makmal_full'])) {
        //     $viewOnly = false;
        // }

        return view('perunding.kewangan.unjuran.unjuran',['viewOnly'=>$viewOnly,'project_id'=>$project_id,'perolehan_id'=>$perolehan_id]);
    }

    public function YuranPerunding($project_id,$perolehan_id){
        
        $viewOnly = false;
        // if ($user_new->hasAnyDirectPermission(['vm_senarai_selasai_makmal_edit','vm_senarai_selasai_makmal_full'])) {
        //     $viewOnly = false;
        // }

        return view('perunding.kewangan.yuran_perunding.yuran',['viewOnly'=>$viewOnly,'project_id'=>$project_id,'perolehan_id'=>$perolehan_id]);
    }

    public function lejarBayaran($project_id,$perolehan_id){
        
        $viewOnly = false;
        // if ($user_new->hasAnyDirectPermission(['vm_senarai_selasai_makmal_edit','vm_senarai_selasai_makmal_full'])) {
        //     $viewOnly = false;
        // }

        return view('perunding.kewangan.lejar_bayaran.lejar_bayaran',['viewOnly'=>$viewOnly,'project_id'=>$project_id,'perolehan_id'=>$perolehan_id]);
    }

    public function borangJps($project_id,$perolehan_id){
        
        $viewOnly = false;
        // if ($user_new->hasAnyDirectPermission(['vm_senarai_selasai_makmal_edit','vm_senarai_selasai_makmal_full'])) {
        //     $viewOnly = false;
        // }

        return view('perunding.kewangan.borang.borang',['viewOnly'=>$viewOnly,'project_id'=>$project_id,'perolehan_id'=>$perolehan_id]);
    }

    public function imbuhanBalik($project_id,$perolehan_id){
        
        $viewOnly = false;
        // if ($user_new->hasAnyDirectPermission(['vm_senarai_selasai_makmal_edit','vm_senarai_selasai_makmal_full'])) {
        //     $viewOnly = false;
        // }

        return view('perunding.kewangan.imbuhan_balik.imbuhan_balik',['viewOnly'=>$viewOnly,'project_id'=>$project_id,'perolehan_id'=>$perolehan_id]);
    }

}