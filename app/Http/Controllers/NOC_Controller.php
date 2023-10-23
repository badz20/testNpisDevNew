<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class NOC_Controller extends Controller
{
    //
    public function index(){
        $user=Session::get('userType'); //print_r($user);exit;
        $id='';
        return view('noc.Kertas_Permohonan_NOC.Kertas_Permohonan_NOC',compact('id','user'));
    }

    public function notis_perubahan(){
        $id='';
        $user=Session::get('userType'); 
        return view('noc.notis_perubahan.notis_perubahan',compact('id','user'));
    }

    public function addnotisPerubahan(){
        $id='';
        $user=Session::get('userType'); 
        return view('noc.kertas_permohonan.add_kertas',compact('id','user'));
    }

    public function nocPageData($id){
        $user=Session::get('userType'); 
        return view('noc.edit_notis_perubahan.notis_perubahan',compact('id','user'));
    }

    public function notis_perubahan_negeri(){
        $id='';
        return view('noc.edit_notis_perubahan.perubahan_negeri',compact('id'));
    }

    public function nocKementerian($id){
        return view('noc.kementerian.kementerian_view',compact('id'));
    }

    public function PeruntukanTahunan(){
        $user=Session::get('userType'); //print_r($user);exit;
        return view('noc.peruntukan.senerai',compact('user'));
    }

    public function seneraiNoc($id)
    {
        $user=Session::get('userType'); //print_r($user);exit;
        return view('noc.mengikut_bilanagan.senerai_projek',compact('user','id'));  
    }

    public function loadProjeck($id,$type)
    {  
        $user=Session::get('userType'); //print_r($user);exit;
        return view('noc.tamba_projek.tamba_projek',compact('user','id','type'));  
    }

    public function loadKementerianSilling($id)
    {
        $user=Session::get('userType'); //print_r($user);exit;
        return view('noc.kementerian_silling.kementerian',compact('user','id'));  
    }

    public function keperluanPeruntukanJBT()
    {
        $user=Session::get('userType'); //print_r($user);exit;
        return view('noc.keperluan_peruntukan.view',compact('user'));  
    }
}
