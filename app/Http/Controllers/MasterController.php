<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\refNegeri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class MasterController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $roles = $user->roles;
        
        $viewOnly = false;
        // if ($user->hasAnyDirectPermission(['pentadbir_master_full','pentadbir_master_edit'])) {
        //     $viewOnly = false;
        // }
        return view('masterData.master.index',compact('viewOnly'));
    }

    public function negeri()
    {
        return view('masterData.negeri.negeri');
    }

    public function daerah($negeriId)
    {                
        return view('masterData.daerah.daerah',compact('negeriId'));
    }

    public function daerahAll()
    {        
        $negeriId = 0;
        return view('masterData.daerah.daerah',compact('negeriId'));
    }

    public function mukim($daerahId)
    {
        return view('masterData.mukim.mukim',compact('daerahId'));
    }

    public function mukimAll()
    {        
        $daerahId = 0;
        return view('masterData.mukim.mukim',compact('daerahId'));
    }

    public function parliment($negeriId)
    {
        return view('masterData.parliment.parliment',compact('negeriId'));
    }

    public function parlimentAll()
    {        
        $negeriId = 0;
        return view('masterData.parliment.parliment',compact('negeriId'));
    }

    public function dun($parlimenId)
    {
        return view('masterData.dun.dun',compact('parlimenId'));
    }

    public function dunAll()
    {        
        $parlimenId = 0;
        return view('masterData.dun.dun',compact('parlimenId'));
    }

    public function kementerian()
    {
        return view('masterData.kementerian.kementerian');
    }

    public function gred()
    {
        return view('masterData.gred.gred');
    }

    public function jawatan()
    {
        return view('masterData.jawatan.jawatan');
    }

    public function jabatan($jabatanId)
    {                
        return view('masterData.jabatan.jabatan',compact('jabatanId'));
    }

    public function jabatanAll()
    {        
        $jabatanId = 0;
        return view('masterData.jabatan.jabatan',compact('jabatanId'));
    }

    public function bahagian($bahagianId)
    {                
        return view('masterData.bahagian.bahagian',compact('bahagianId'));
    }

    public function bahagianAll()
    {        
        $bahagianId = 0;
        return view('masterData.bahagian.bahagian',compact('bahagianId'));
    }

    public function rmk(){
        return view('masterData.rmk.rmk');
    }

    public function obb(){
        return view('masterData.obb.obb');
    }

    public function unit(){
        return view('masterData.unit.unit');
    }

    public function komponen(){
        return view('masterData.komponen.komponen');
    }

    public function pejabatprojek(){
        return view('masterData.pejabat.pejabat');
    }

    public function bahagianEpu()
    {
        return view('masterData.bahagianEpu.bahagianEpu');
    }

    public function sektorUtamaAll()
    {        
        $bahagianId = 0;
        return view('masterData.sektorUtama.sektorUtama',compact('bahagianId'));
    }

    public function sektorUtama($bahagianId)
    {                
        return view('masterData.sektorUtama.sektorUtama',compact('bahagianId'));
    }

    public function sektorAll()
    {        
        $sektorUtamaId = 0;
        return view('masterData.sektor.sektor',compact('sektorUtamaId'));
    }

    public function sektor($sektorUtamaId)
    {                
        return view('masterData.sektor.sektor',compact('sektorUtamaId'));
    }

    public function subSektorAll()
    {        
        $subSektorId = 0;
        return view('masterData.subSektor.subSektor',compact('subSektorId'));
    }

    public function subSektor($subSektorId)
    {                
        return view('masterData.subSektor.subSektor',compact('subSektorId'));
    }

    

    public function kategori()
    {
        return view('masterData.kategori.kategori');
    }

    public function subKategori($kategoriId)
    {                
        return view('masterData.subKategori.subKategori',compact('kategoriId'));
    }

    public function subKategoriAll()
    {        
        $kategoriId = 0;
        return view('masterData.subKategori.subKategori',compact('kategoriId'));
    }

    public function sdgmaster(){
        return view('masterData.sdgmaster.sdgmaster');
    }
    public function sasaran(){
        $jabatanId=0;
        return view('masterData.sasaran.sasaran',compact('jabatanId'));
    }
    public function sasaranid($id){
        $jabatanId=$id;
        return view('masterData.sasaran.sasaran',compact('jabatanId'));
    }  
    public function Indikator(){
        $bahagianId = 0;
        return view('masterData.indikator.Indikator',compact('bahagianId'));
    }
    public function Indikatorid($id){
        $bahagianId=$id;
        return view('masterData.indikator.Indikator',compact('bahagianId'));
    }


    public function skops()
    {
        return view('masterData.skop.skop');
    }

    public function subSkop($skopId)
    {                
        return view('masterData.subSkop.subSkop',compact('skopId'));
    }

    public function subSkopAll()
    {        
        $skopId = 0;
        return view('masterData.subSkop.subSkop',compact('skopId'));
    }


    public function options()
    {
        return view('masterData.lookup_options.lookup_options');
    }

    public function Strategi()
    {
        $StrategiId = 0;
        return view('masterData.Strategi.Strategi',compact('StrategiId'));
    }


    public function skopkoscalculation()
    {
        return view('masterData.skopkoscalculation.skopkoscalculation');
    }

    public function roles()
    {
        return view('masterData.role.role');
    }

    public function Module()
    {
        return view('masterData.module.module');
    }

    public function permissions()
    {
        return view('masterData.permissions.permissions');
    }

    public function UserTypes()
    {
        return view('masterData.userTypes.userTypes');
    }

    public function deliverableHeadingAll()
    {        
        $negeriId = 0;
        return view('masterData.deliverableHeadings.deliverableHeadings',compact('negeriId'));
    }

    public function deliverable($headingId)
    {
        return view('masterData.deliverables.deliverables',compact('headingId'));
    }

    public function deliverableAll()
    {        
        $headingId = 0;
        return view('masterData.deliverables.deliverables',compact('headingId'));
    }


    public function Belanja_mengurus_skop()
    {
        return view('masterData.belanja_mengurus_skop.belanja_mengurus_skop');
    }

    public function Belanja_mengurus_subskop()
    {
        return view('masterData.belanja_mengurus_subskop.belanja_mengurus_subskop');
    }

    public function Nama_Agensi()
    {
        return view('masterData.nama_agensi.nama_agensi');
    }

    public function RolePermission($id,$name)
    {
        $user=Session::get('userType'); //print_r($user);
        $role=Session::get('userRole'); //print_r($userRole);exit;  
        $penyemak=Session::get('penyemak');
        $penyemak_1=Session::get('penyemak_1');
        $penyemak_2=Session::get('penyemak_2'); 
        $pengesah=Session::get('pengesah'); 
        
        $is_submitted = false;  
        $is_review = false;

        $is_enable=true;
        $negeri=Session::get('negeri_id'); 
        $daerah=Session::get('daerah_id');
        $bahagian=Session::get('bahagian');
        $status=1;
        $user_id=1;

        $is_clickable =true;
        // return view('masterData.role_permission.role_permission',['id'=>$id]);
        return view('masterData.role_permission.role_permission',compact('id','user','role','is_submitted','is_review','status','user_id','negeri','daerah','bahagian','penyemak','penyemak_1','penyemak_2','pengesah','name'));


    }
        
}
