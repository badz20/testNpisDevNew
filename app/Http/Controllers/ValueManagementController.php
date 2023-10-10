<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ValueManagementController extends Controller
{
    public function list(){
        // $userAuth = Auth::user();
        // $roles = $userAuth->roles;
        
        // $viewOnly = true;
        // if ($user->hasAnyDirectPermission(['vm_senarai_makmal_and_mini_edit','vm_senarai_makmal_and_mini_full'])) {
        //     $viewOnly = false;
        // }
        $user=Session::get('userType'); //print_r($user);
        $userRole=Session::get('userRole'); //print_r($userRole);exit;
        $penyemak=Session::get('penyemak');
        $penyemak_1=Session::get('penyemak_1');
        $penyemak_2=Session::get('penyemak_2'); 
        $pengesah=Session::get('pengesah'); 
        $negeri=Session::get('negeri_id'); 
        $daerah=Session::get('daerah_id');
        $bahagian=Session::get('bahagian');

        $user_new = Auth::user();
        $roles = $user_new->roles;

        $viewOnly = true;
        if ($user_new->hasAnyDirectPermission(['vm_senarai_selasai_makmal_edit','vm_senarai_selasai_makmal_full'])) {
            $viewOnly = false;
        }

        return view('valueManagement.senaraiVA.senarai_makmal_and_mini',['user'=>$user,'role'=>$userRole,'negeri'=>$negeri,'daerah'=>$daerah,
        'bahagian'=>$bahagian,'penyemak'=>$penyemak,'penyemak_1'=>$penyemak_1,'penyemak_2'=>$penyemak_2,'pengesah'=>$pengesah,'viewOnly'=>$viewOnly]);
    }

    public function loadRingkasan($kod,$type)
    {
        $user=Session::get('userType'); //print_r($user);
        $userRole=Session::get('userRole'); //print_r($userRole);exit;
        $penyemak=Session::get('penyemak');
        $penyemak_1=Session::get('penyemak_1');
        $penyemak_2=Session::get('penyemak_2'); 
        $pengesah=Session::get('pengesah'); 
        $negeri=Session::get('negeri_id'); 
        $daerah=Session::get('daerah_id');
        $bahagian=Session::get('bahagian');
        return view('valueManagement.ringkasan.ringkasan',['type'=>$type,'user'=>$user,'role'=>$userRole,'negeri'=>$negeri,'daerah'=>$daerah,
        'bahagian'=>$bahagian,'penyemak'=>$penyemak,'penyemak_1'=>$penyemak_1,'penyemak_2'=>$penyemak_2,'pengesah'=>$pengesah,'kod_projek'=>$kod]);
    }

    public function KalendarVM($kod,$type){
        
        $user = Auth::user();
        $roles = $user->roles;
        $user=Session::get('userType'); //print_r($user);

        $viewOnly = false;
        // if ($user->hasAnyDirectPermission(['vm_KalendarVM_edit','vm_KalendarVM_full'])) {
        //     $viewOnly = false;
        // }
        // foreach($roles as $role) {
        //         if ($role->hasAnyPermission()) {
        //             $viewOnly = false;
        //         }
        // }
        if($type=='VE' || $type=='VR')
        {
            return view('valueManagement.KalendarVE.Kalendar',['type'=>$type,'kod_projek'=>$kod,'viewOnly' => $viewOnly,'user_type'=>$user]);
        }
        else
        {
            return view('valueManagement.KalendarVM.Kalendar',['type'=>$type,'kod_projek'=>$kod,'viewOnly' => $viewOnly,'user_type'=>$user]);
        }
    }

    // public function projectSections($kod,$section)
    // {
    //     $user=Session::get('userType'); //print_r($user);
    //     $userRole=Session::get('userRole'); //print_r($userRole);exit;
    //     $penyemak=Session::get('penyemak');
    //     $penyemak_1=Session::get('penyemak_1');
    //     $penyemak_2=Session::get('penyemak_2'); 
    //     $pengesah=Session::get('pengesah'); 
    //     $negeri=Session::get('negeri_id'); 
    //     $daerah=Session::get('daerah_id');
    //     $bahagian=Session::get('bahagian');

    //     switch ($section) {

    //         case 'ringkasan':
    //             return view('valueManagement.ringkasan.ringkasan',compact('user','userRole','penyemak','penyemak_1','penyemak_2','pengesah','negeri','daerah','bahagian','kod_projek'));
    //             break;

    //         case 'kalendarVM':
    //             return view('valueManagement.KalendarVM.Kalendar',compact('user','userRole','penyemak','penyemak_1','penyemak_2','pengesah','negeri','daerah','bahagian','kod_projek'));
    //             break;

    //         case 'maklumat_pelakasanaan_makmal':
    //             return view('valueManagement.pelakasanan_makmal.pelakasanan_makmal',compact('user','userRole','penyemak','penyemak_1','penyemak_2','pengesah','negeri','daerah','bahagian','kod_projek'));
    //             break;
    //     }
    // }

    public function maklumatPelakasanaanMakmal($kod,$type)
    {

        $user = Auth::user();
        $roles = $user->roles;

        $viewOnly = true;
        if ($user->hasAnyDirectPermission(['vm_senarai_makmal_and_mini_edit','vm_senarai_makmal_and_mini_full'])) {
            $viewOnly = false;
        }
        // foreach($roles as $role) {
        //         if ($role->hasAnyPermission(['vm_Senarai Makmal VA & Mini VA_edit','vm_Senarai Makmal VA & Mini VA_full'])) {
        //             $viewOnly = false;
        //         }
        // }

        $user=Session::get('userType'); //print_r($user);
        $userRole=Session::get('userRole'); //print_r($userRole);exit;
        $penyemak=Session::get('penyemak');
        $penyemak_1=Session::get('penyemak_1');
        $penyemak_2=Session::get('penyemak_2'); 
        $pengesah=Session::get('pengesah'); 
        $negeri=Session::get('negeri_id'); 
        $daerah=Session::get('daerah_id');
        $bahagian=Session::get('bahagian');
        if($type=='Mini_VA')
        {
            return view('valueManagement.pelakasanan_mini_makmal.pelakasanan_mini_makmal',['type'=>$type,'user'=>$user,'role'=>$userRole,'negeri'=>$negeri,'daerah'=>$daerah,
            'bahagian'=>$bahagian,'penyemak'=>$penyemak,'penyemak_1'=>$penyemak_1,'penyemak_2'=>$penyemak_2,'pengesah'=>$pengesah,'kod_projek'=>$kod,'viewOnly' => $viewOnly]);
        }
        else if($type=='VE')
        {
            return view('valueManagement.pelakasanan_makmal_VE.pelakasanan_makmal',['type'=>$type,'user'=>$user,'role'=>$userRole,'negeri'=>$negeri,'daerah'=>$daerah,
            'bahagian'=>$bahagian,'penyemak'=>$penyemak,'penyemak_1'=>$penyemak_1,'penyemak_2'=>$penyemak_2,'pengesah'=>$pengesah,'kod_projek'=>$kod,'viewOnly' => $viewOnly]);
        }
        else
        {
            return view('valueManagement.pelakasanan_makmal.pelakasanan_makmal',['type'=>$type,'user'=>$user,'role'=>$userRole,'negeri'=>$negeri,'daerah'=>$daerah,
                             'bahagian'=>$bahagian,'penyemak'=>$penyemak,'penyemak_1'=>$penyemak_1,'penyemak_2'=>$penyemak_2,'pengesah'=>$pengesah,'kod_projek'=>$kod,'viewOnly' => $viewOnly]);

        }
        
    }

    public function maklumatPelakasanaanMakmalVR($kod,$type){
        $user=Session::get('userType'); //print_r($user);
        $userRole=Session::get('userRole'); //print_r($userRole);exit;
        $penyemak=Session::get('penyemak');
        $penyemak_1=Session::get('penyemak_1');
        $penyemak_2=Session::get('penyemak_2'); 
        $pengesah=Session::get('pengesah'); 
        $negeri=Session::get('negeri_id'); 
        $daerah=Session::get('daerah_id');
        $bahagian=Session::get('bahagian');
        return view('valueManagement.vr_tandatangan.vr_tandatangan',['kod_projek'=>$kod,'type'=>$type,'user'=>$user,'role'=>$userRole,'negeri'=>$negeri,'daerah'=>$daerah,
        'bahagian'=>$bahagian,'penyemak'=>$penyemak,'penyemak_1'=>$penyemak_1,'penyemak_2'=>$penyemak_2,'pengesah'=>$pengesah]);
    } 

    public function maklumatPelakasanaanMakmal_VR($kod,$type){
        $user=Session::get('userType'); //print_r($user);
        $userRole=Session::get('userRole'); //print_r($userRole);exit;
        $penyemak=Session::get('penyemak');
        $penyemak_1=Session::get('penyemak_1');
        $penyemak_2=Session::get('penyemak_2'); 
        $pengesah=Session::get('pengesah'); 
        $negeri=Session::get('negeri_id'); 
        $daerah=Session::get('daerah_id');
        $bahagian=Session::get('bahagian');
        return view('valueManagement.maklumatPelakasanaanMakmal_VR.maklumatPelakasanaanMakmal_VR',['kod_projek'=>$kod,'type'=>$type,'user'=>$user,'role'=>$userRole,'negeri'=>$negeri,'daerah'=>$daerah,
        'bahagian'=>$bahagian,'penyemak'=>$penyemak,'penyemak_1'=>$penyemak_1,'penyemak_2'=>$penyemak_2,'pengesah'=>$pengesah]);
    }

    public function listFasilitator(){
        $user=Session::get('userType'); //print_r($user);
        $userRole=Session::get('userRole'); //print_r($userRole);exit;

        $userAuth = Auth::user();
        $roles = $userAuth->roles;

        $viewOnly = true;
        if ($userAuth->hasAnyDirectPermission(['vm_fasilitator_full','vm_fasilitator_edit'])) {
            $viewOnly = false;
        }

        return view('valueManagement.fasilitator.fasilitator',['user'=>$user,'role'=>$userRole,'viewOnly' => $viewOnly]);
    }

    public function senaraiSelasaiMakmal()
    {
        $userAuth = Auth::user();
        $roles = $userAuth->roles;

        $viewOnly = true;
        if ($userAuth->hasAnyDirectPermission(['vm_senarai_selasai_makmal_full','vm_senarai_selasai_makmal_edit'])) {
            $viewOnly = false;
        }
        $user=Session::get('userType'); //print_r($user);
        $userRole=Session::get('userRole'); //print_r($userRole);exit;
        $penyemak=Session::get('penyemak');
        $penyemak_1=Session::get('penyemak_1');
        $penyemak_2=Session::get('penyemak_2'); 
        $pengesah=Session::get('pengesah'); 
        $negeri=Session::get('negeri_id'); 
        $daerah=Session::get('daerah_id');
        $bahagian=Session::get('bahagian');
        return view('valueManagement.selesai_makmal.selesai_makmal',['user'=>$user,'role'=>$userRole,'negeri'=>$negeri,'daerah'=>$daerah,
        'bahagian'=>$bahagian,'penyemak'=>$penyemak,'penyemak_1'=>$penyemak_1,'penyemak_2'=>$penyemak_2,'pengesah'=>$pengesah,'viewOnly'=>$viewOnly]);
        
    }

    public function va_tandatangan($kod,$type){
        $user=Session::get('userType'); //print_r($user);
        $userRole=Session::get('userRole'); //print_r($userRole);exit;
        $penyemak=Session::get('penyemak');
        $penyemak_1=Session::get('penyemak_1');
        $penyemak_2=Session::get('penyemak_2'); 
        $pengesah=Session::get('pengesah'); 
        $negeri=Session::get('negeri_id'); 
        $daerah=Session::get('daerah_id');
        $bahagian=Session::get('bahagian');
        return view('valueManagement.va_tandatangan.va_tandatangan',['kod_projek'=>$kod,'type'=>$type,'user'=>$user,'role'=>$userRole,'negeri'=>$negeri,'daerah'=>$daerah,
        'bahagian'=>$bahagian,'penyemak'=>$penyemak,'penyemak_1'=>$penyemak_1,'penyemak_2'=>$penyemak_2,'pengesah'=>$pengesah]);
    }

    public function Penjilidan($kod,$type){
        $user=Session::get('userType'); //print_r($user);
        $userRole=Session::get('userRole'); //print_r($userRole);exit;
        $penyemak=Session::get('penyemak');
        $penyemak_1=Session::get('penyemak_1');
        $penyemak_2=Session::get('penyemak_2'); 
        $pengesah=Session::get('pengesah'); 
        $negeri=Session::get('negeri_id'); 
        $daerah=Session::get('daerah_id');
        $bahagian=Session::get('bahagian');
        $userAuth = Auth::user();

        if($type=='VE')
        {
            return view('valueManagement.penjilidan_ve_list.penjilidan',['kod_projek'=>$kod,'type'=>$type,'user'=>$user,'role'=>$userRole,'negeri'=>$negeri,'daerah'=>$daerah,
            'bahagian'=>$bahagian,'penyemak'=>$penyemak,'penyemak_1'=>$penyemak_1,'penyemak_2'=>$penyemak_2,'pengesah'=>$pengesah]);
        }
        else
        {
            return view('valueManagement.penjilidan.penjilidan',['kod_projek'=>$kod,'type'=>$type,'user'=>$user,'role'=>$userRole,'negeri'=>$negeri,'daerah'=>$daerah,
        'bahagian'=>$bahagian,'penyemak'=>$penyemak,'penyemak_1'=>$penyemak_1,'penyemak_2'=>$penyemak_2,'pengesah'=>$pengesah]);

        }
        
    }

    public function mini_va_tandatangan($kod,$type){
        $user=Session::get('userType'); //print_r($user);
        $userRole=Session::get('userRole'); //print_r($userRole);exit;
        $penyemak=Session::get('penyemak');
        $penyemak_1=Session::get('penyemak_1');
        $penyemak_2=Session::get('penyemak_2'); 
        $pengesah=Session::get('pengesah'); 
        $negeri=Session::get('negeri_id'); 
        $daerah=Session::get('daerah_id');
        $bahagian=Session::get('bahagian');

        $viewOnly = false;
        if($user==4)
        {
            $viewOnly = true;
        }
        return view('valueManagement.va_mini_tandatangan.va_tandatangan',['kod_projek'=>$kod,'type'=>$type,'user'=>$user,'role'=>$userRole,'negeri'=>$negeri,'daerah'=>$daerah,
        'bahagian'=>$bahagian,'penyemak'=>$penyemak,'penyemak_1'=>$penyemak_1,'penyemak_2'=>$penyemak_2,'pengesah'=>$pengesah,'viewOnly'=>$viewOnly]);
    }
}

?>
