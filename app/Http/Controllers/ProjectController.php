<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;



class ProjectController extends Controller
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

    public function dashboard()
    {
        $Accesstoken = '';
        // dd($token);
        $link = 'https://rinm8n4id9eojflo.maps.arcgis.com/apps/webappviewer/index.html#/dc53af74ec194c21abc0009417bcfea4';
        $url = $link . '?token=' . $Accesstoken; //print_r($url);exit;

        $users = Auth::user();

        if ($users->tokens->count() == 0) {
            $token = Auth::user()->createToken('user' . $users->id)->plainTextToken;
        } else {
            $users->tokens()->delete();
            $token = $users->createToken('user' . $users->id)->plainTextToken;
        }


        // $viewOnly = true;
        // if ($user->hasAnyDirectPermission(['permohon_parmohonan-project-dashboard_edit','permohon_parmohonan-project-dashboard_full'])) {
        //     $viewOnly = false;
        //     Log::info('test');
        // }

        Log::info(' test outside');



        $user = Session::get('userType');
        $daerah = Session::get('daerah_id');
        $negeri = Session::get('negeri_id');
        $bahagian = Session::get('bahagian');

        if ($users->user_type_id == 3 || $users->user_type_id == 4) {
            return view('project.dashboard.bahagian_dashboard', compact('token', 'user', 'daerah', 'negeri', 'bahagian', 'url'));
        } else {
            return view('project.dashboard.parmohonan-project-dashboard', compact('token', 'user', 'daerah', 'negeri', 'bahagian', 'url'));
        }
    }

    public function dashboard2()
    {
        $Accesstoken = '';
        // dd($token);
        $link = 'https://rinm8n4id9eojflo.maps.arcgis.com/apps/webappviewer/index.html#/dc53af74ec194c21abc0009417bcfea4';
        $url = $link . '?token=' . $Accesstoken; //print_r($url);exit;

        $users = Auth::user();

        if ($users->tokens->count() == 0) {
            $token = Auth::user()->createToken('user' . $users->id)->plainTextToken;
        } else {
            $users->tokens()->delete();
            $token = $users->createToken('user' . $users->id)->plainTextToken;
        }


        // $viewOnly = true;
        // if ($user->hasAnyDirectPermission(['permohon_parmohonan-project-dashboard_edit','permohon_parmohonan-project-dashboard_full'])) {
        //     $viewOnly = false;
        //     Log::info('test');
        // }

        Log::info(' test outside');



        $user = Session::get('userType');
        $daerah = Session::get('daerah_id');
        $negeri = Session::get('negeri_id');
        $bahagian = Session::get('bahagian');

        if ($users->user_type_id == 3 || $users->user_type_id == 4) {
            return view('project.dashboard.bahagian_dashboard_2', compact('token', 'user', 'daerah', 'negeri', 'bahagian', 'url'));
        } else {
            return view('project.dashboard.parmohonan-project-dashboard', compact('token', 'user', 'daerah', 'negeri', 'bahagian', 'url'));
        }
    }

    public function projectdashboard()
    {
        $Accesstoken = '';
        // dd($token);
        $link = 'https://rinm8n4id9eojflo.maps.arcgis.com/apps/webappviewer/index.html#/dc53af74ec194c21abc0009417bcfea4';
        $url = $link . '?token=' . $Accesstoken; //print_r($url);exit;

        $users = Auth::user();

        if ($users->tokens->count() == 0) {
            $token = Auth::user()->createToken('user' . $users->id)->plainTextToken;
        } else {
            $users->tokens()->delete();
            $token = $users->createToken('user' . $users->id)->plainTextToken;
        }



        $user = Session::get('userType');
        $daerah = Session::get('daerah_id');
        $negeri = Session::get('negeri_id');
        $bahagian = Session::get('bahagian');

        return view('project.dashboard.parmohonan-project-dashboard', compact('token', 'user', 'daerah', 'negeri', 'bahagian', 'url'));
    }

    private function getToken()
    {
        $username = 'riddhihecta';
        $password = 'new2023year';
        $serverUrl = 'https://www.arcgis.com/sharing/rest/generateToken';

        $response = Http::asForm()->post($serverUrl, [
            'f' => 'json',
            'username' => $username,
            'password' => $password,
            'referer' => request()->fullUrl(),
            'expiration' => 1440,
        ]);


        if ($response->successful()) {
            $data = $response->json();
            $token = $data['token'];
            return $token;
            // Pass the obtained token to the function that creates the iframe
            // $this->createIframe($token);
        } else {
            $error = $response->json('error');
            // Handle the error accordingly
            // For example: return a response with error message or throw an exception
            // return response()->json(['error' => $error], 400);
            // throw new \Exception('Error while obtaining the token: ' . $error);
        }
    }

    public function index()
    {
        $user_data = Auth::user();
        $roles = $user_data->roles;
        $viewOnly = false;
        // if ($user_data->hasAnyDirectPermission(['permohon_daftar-permohonan-project_full','permohon_daftar-permohonan-project_edit'])) {
        //     $viewOnly = false;
        //     Log::info('test');
        // }

        Log::info(' test outside');
        $user = Session::get('userType');
        $userRole = Session::get('userRole');
        $penyemak = Session::get('penyemak');
        $penyemak_1 = Session::get('penyemak_1');
        $penyemak_2 = Session::get('penyemak_2');
        $pengesah = Session::get('pengesah');
        $peraku = Session::get('peraku');


        $negeri = Session::get('negeri_id');
        $daerah = Session::get('daerah_id');
        $bahagian = Session::get('bahagian');
        Session::put("list", "");
        Session::put("list", "senarai");
        return view('project.list.project-application-list', [
            'user' => $user, 'role' => $userRole, 'negeri' => $negeri, 'daerah' => $daerah,
            'bahagian' => $bahagian, 'penyemak' => $penyemak, 'penyemak_1' => $penyemak_1, 'penyemak_2' => $penyemak_2, 'pengesah' => $pengesah, 'viewOnly' => $viewOnly, 'peraku' => $peraku
        ]);
    }
    public function PermohonanProjekList()
    {
        $user = Session::get('userType'); //print_r($user);
        $userRole = Session::get('userRole'); //print_r($userRole);exit;
        $penyemak = Session::get('penyemak');
        $penyemak_1 = Session::get('penyemak_1');
        $penyemak_2 = Session::get('penyemak_2');
        $pengesah = Session::get('pengesah');
        $peraku = Session::get('peraku');

        $negeri = Session::get('negeri_id');
        $daerah = Session::get('daerah_id');
        $bahagian = Session::get('bahagian');
        Session::put("list", "");
        Session::put("list", "permohonan");

        $user_data = Auth::user();
        $roles = $user_data->roles;
        $viewOnly = false;
        // if ($user_data->hasAnyDirectPermission(['permohon_project-list_full','permohon_project-list_edit'])) {
        //     $viewOnly = false;
        //     Log::info('test');
        // }

        return view('project.Permohonan-Projek-list.projectlist', [
            'user' => $user, 'role' => $userRole, 'negeri' => $negeri, 'daerah' => $daerah,
            'bahagian' => $bahagian, 'penyemak' => $penyemak, 'penyemak_1' => $penyemak_1, 'penyemak_2' => $penyemak_2, 'pengesah' => $pengesah, 'peraku' => $peraku
        ]);
    }

    public function SemakProjekList()
    {
        $user = Session::get('userType'); //print_r($user);
        $userRole = Session::get('userRole'); //print_r($userRole);exit;
        $penyemak = Session::get('penyemak');
        $penyemak_1 = Session::get('penyemak_1');
        $penyemak_2 = Session::get('penyemak_2');
        $pengesah = Session::get('pengesah');
        $peraku = Session::get('peraku');

        $negeri = Session::get('negeri_id');
        $daerah = Session::get('daerah_id');
        $bahagian = Session::get('bahagian');
        Session::put("list", "");
        Session::put("list", "semak");

        $user_data = Auth::user();
        $roles = $user_data->roles;
        $viewOnly = true;
        if ($user_data->hasAnyDirectPermission(['permohon_semak-project-list_full', 'permohon_semak-project-list_edit'])) {
            $viewOnly = false;
            Log::info('test');
        }

        return view('project.semak.project-list', [
            'user' => $user, 'role' => $userRole, 'negeri' => $negeri, 'daerah' => $daerah,
            'bahagian' => $bahagian, 'penyemak' => $penyemak, 'penyemak_1' => $penyemak_1, 'penyemak_2' => $penyemak_2, 'pengesah' => $pengesah, 'peraku' => $peraku
        ]);
    }

    public function PengesahanProjekList()
    {
        $user = Session::get('userType'); //print_r($user);
        $userRole = Session::get('userRole'); //print_r($userRole);exit;
        $penyemak = Session::get('penyemak');
        $penyemak_1 = Session::get('penyemak_1');
        $penyemak_2 = Session::get('penyemak_2');
        $pengesah = Session::get('pengesah');
        $peraku = Session::get('peraku');

        $negeri = Session::get('negeri_id');
        $daerah = Session::get('daerah_id');
        $bahagian = Session::get('bahagian');
        Session::put("list", "");
        Session::put("list", "semak");

        $user_data = Auth::user();
        $roles = $user_data->roles;
        $viewOnly = true;
        if ($user_data->hasAnyDirectPermission(['permohon_semak-project-list_full', 'permohon_semak-project-list_edit'])) {
            $viewOnly = false;
            Log::info('test');
        }

        return view('project.pengesah-list.project-list', [
            'user' => $user, 'role' => $userRole, 'negeri' => $negeri, 'daerah' => $daerah,
            'bahagian' => $bahagian, 'penyemak' => $penyemak, 'penyemak_1' => $penyemak_1, 'penyemak_2' => $penyemak_2, 'pengesah' => $pengesah, 'peraku' => $peraku
        ]);
    }

    public function PerakuProjekList()
    {
        $user = Session::get('userType'); //print_r($user);
        $userRole = Session::get('userRole'); //print_r($userRole);exit;
        $penyemak = Session::get('penyemak');
        $penyemak_1 = Session::get('penyemak_1');
        $penyemak_2 = Session::get('penyemak_2');
        $pengesah = Session::get('pengesah');
        $negeri = Session::get('negeri_id');
        $daerah = Session::get('daerah_id');
        $bahagian = Session::get('bahagian');
        Session::put("list", "");
        Session::put("list", "semak");
        $peraku = Session::get('peraku');


        $user_data = Auth::user();
        $roles = $user_data->roles;
        $viewOnly = true;
        if ($user_data->hasAnyDirectPermission(['permohon_semak-project-list_full', 'permohon_semak-project-list_edit'])) {
            $viewOnly = false;
            Log::info('test');
        }

        return view('project.peraku-list.project-list', [
            'user' => $user, 'role' => $userRole, 'negeri' => $negeri, 'daerah' => $daerah,
            'bahagian' => $bahagian, 'penyemak' => $penyemak, 'penyemak_1' => $penyemak_1, 'penyemak_2' => $penyemak_2, 'pengesah' => $pengesah, 'peraku' => $peraku
        ]);
    }

    public function SalinProjekList()
    {
        $user = Session::get('userType'); //print_r($user);
        $userRole = Session::get('userRole'); //print_r($userRole);exit;
        $penyemak = Session::get('penyemak');
        $penyemak_1 = Session::get('penyemak_1');
        $penyemak_2 = Session::get('penyemak_2');
        $pengesah = Session::get('pengesah');
        $negeri = Session::get('negeri_id');
        $daerah = Session::get('daerah_id');
        $bahagian = Session::get('bahagian');
        Session::put("list", "");
        Session::put("list", "semak");
        $peraku = Session::get('peraku');

        $user_data = Auth::user();
        $roles = $user_data->roles;
        $viewOnly = true;
        if ($user_data->hasAnyDirectPermission(['permohon_salin-project-list_full', 'permohon_salin-project-list_edit'])) {
            $viewOnly = false;
            Log::info('test');
        }

        return view('project.salin.project-list', [
            'user' => $user, 'role' => $userRole, 'negeri' => $negeri, 'daerah' => $daerah,
            'bahagian' => $bahagian, 'penyemak' => $penyemak, 'penyemak_1' => $penyemak_1, 'penyemak_2' => $penyemak_2, 'pengesah' => $pengesah, 'peraku' => $peraku
        ]);
    }

    public function daftar()
    {
        $user_data = Auth::user();
        $roles = $user_data->roles;
        $viewOnly = false;
        // if ($user_data->hasAnyDirectPermission(['permohon_daftar-permohonan-project_full','permohon_daftar-permohonan-project_edit'])) {
        //     $viewOnly = false;
        //     Log::info('test');
        // }
        $negeri = Session::get('negeri_id');
        $daerah = Session::get('daerah_id');
        $bahagian = Session::get('bahagian');
        $user = Session::get('userType'); //print_r($user);
        $userRole = Session::get('userRole'); //print_r($userRole);exit;
        $penyemak = Session::get('penyemak');
        $penyemak_1 = Session::get('penyemak_1');
        $penyemak_2 = Session::get('penyemak_2');
        $pengesah = Session::get('pengesah');
        $peraku = Session::get('peraku');

        return view('project.daftar.Daftar-Permohonan-Projek', [
            'user' => $user, 'role' => $userRole, 'negeri' => $negeri, 'daerah' => $daerah,
            'bahagian' => $bahagian, 'penyemak' => $penyemak, 'penyemak_1' => $penyemak_1, 'penyemak_2' => $penyemak_2, 'pengesah' => $pengesah, 'viewOnly' => $viewOnly, 'peraku' => $peraku
        ]);
    }

    public function daftarEdit($id, $status, $user_id)
    { //dd($status,$user_id);
        $user_data = Auth::user();
        $roles = $user_data->roles;
        $viewOnly = false;
        // if ($user_data->hasAnyDirectPermission(['permohon_daftar-permohonan-project_full','permohon_daftar-permohonan-project_edit'])) {
        //     $viewOnly = false;
        //     Log::info('test');
        // }
        Log::info('test1');

        $negeri = Session::get('negeri_id');
        $daerah = Session::get('daerah_id');
        $bahagian = Session::get('bahagian');
        $penyemak = Session::get('penyemak');
        $penyemak_1 = Session::get('penyemak_1');
        $penyemak_2 = Session::get('penyemak_2');
        $pengesah = Session::get('pengesah');
        $peraku = Session::get('peraku');

        $user = Session::get('userType'); //print_r($user);
        $role = Session::get('userRole'); //print_r($userRole);exit;  
        $is_submitted = false;
        $is_review = false;
        // if($status != 1) {
        //     $is_submitted = true;
        // }
        // if(Auth::user()->id != $user_id) {
        //     $is_review = true;
        // }
        $is_enable = $this->setEnableorDisable($status, $user_id);
        if ($is_enable == 0) {
            $is_submitted = true;
            $is_review = true;
        }

        $is_clickable = $this->setButtonAccess($status, $user_id);
        $enable_approve = $this->setApproveCheckboxAccess($status);
        // dd($viewOnly);

        return view('project.daftar.edit.daftar-edit', compact('id', 'user', 'role', 'negeri', 'daerah', 'is_clickable', 'enable_approve', 'is_submitted', 'is_review', 'status', 'user_id', 'bahagian', 'penyemak', 'penyemak_1', 'penyemak_2', 'pengesah', 'viewOnly', 'peraku'));
    }

    public function projectSections($id, $status, $user_id, $section)
    {
        $user_data = Auth::user();
        $roles = $user_data->roles;
        $viewOnly = false;
        // if ($user_data->hasAnyDirectPermission(['permohon_daftar-permohonan-project_full','permohon_daftar-permohonan-project_edit'])) {
        //     $viewOnly = false;
        //     Log::info('test');
        // }
        $user = Session::get('userType'); //print_r($user);
        $role = Session::get('userRole'); //print_r($userRole);exit;  
        $penyemak = Session::get('penyemak');
        $penyemak_1 = Session::get('penyemak_1');
        $penyemak_2 = Session::get('penyemak_2');
        $pengesah = Session::get('pengesah');
        $peraku = Session::get('peraku');



        $is_submitted = false;
        $is_review = false;
        // if($status != 1) {
        //     $is_submitted = true;
        // }

        // if(Auth::user()->id != $user_id) {
        //     $is_review = true;
        // }

        $is_enable = $this->setEnableorDisable($status, $user_id);
        if ($is_enable == 0) {
            $is_submitted = true;
            $is_review = true;
        }

        $negeri = Session::get('negeri_id');
        $daerah = Session::get('daerah_id');
        $bahagian = Session::get('bahagian');

        $is_clickable = $this->setButtonAccess($status, $user_id);

        switch ($section) {

            case 'rmk':
                return view('project.RMK.rmk', compact('id', 'user', 'role', 'is_submitted', 'is_review', 'status', 'user_id', 'negeri', 'daerah', 'bahagian', 'penyemak', 'penyemak_1', 'penyemak_2', 'pengesah', 'viewOnly', 'peraku'));
                break;

            case 'output':
                return view('project.output.output', compact('id', 'user', 'role', 'is_submitted', 'is_review', 'status', 'user_id', 'negeri', 'daerah', 'bahagian', 'penyemak', 'penyemak_1', 'penyemak_2', 'pengesah', 'viewOnly', 'peraku'));
                break;

            case 'kewangan':
                return view('project.kewangan.kewangan', compact('id', 'user', 'role', 'is_submitted', 'is_review', 'status', 'user_id', 'negeri', 'daerah', 'bahagian', 'penyemak', 'penyemak_1', 'penyemak_2', 'pengesah', 'viewOnly', 'peraku'));
                break;

            case 'negeri':
                return view('project.negeri.negeri-lokasi', compact('id', 'user', 'role', 'is_submitted', 'is_review', 'status', 'user_id', 'negeri', 'daerah', 'bahagian', 'penyemak', 'penyemak_1', 'penyemak_2', 'pengesah', 'viewOnly', 'peraku'));
                break;

            case 'negeri-new':
                return view('project.negeri-new.negeri-lokasi-new', compact('id', 'user', 'role', 'is_submitted', 'is_review', 'status', 'user_id', 'negeri', 'daerah', 'bahagian', 'penyemak', 'penyemak_1', 'penyemak_2', 'pengesah', 'viewOnly', 'peraku'));
                break;

            case 'creativity':
                return view('project.creativity.creativity', compact('id', 'user', 'role', 'is_submitted', 'is_review', 'status', 'user_id', 'negeri', 'daerah', 'bahagian', 'penyemak', 'penyemak_1', 'penyemak_2', 'pengesah', 'viewOnly', 'peraku'));
                break;

            case 'vae':
                return view('project.VAE.vae', compact('id', 'user', 'role', 'is_submitted', 'is_review', 'status', 'user_id', 'negeri', 'daerah', 'bahagian', 'penyemak', 'penyemak_1', 'penyemak_2', 'pengesah', 'viewOnly', 'peraku'));
                break;

            case 'dokumen':
                return view('project.dokumen.dokumen', compact('id', 'user', 'role', 'is_submitted', 'is_review', 'status', 'user_id', 'negeri', 'daerah', 'bahagian', 'penyemak', 'penyemak_1', 'penyemak_2', 'pengesah', 'viewOnly', 'peraku'));
                break;

            case 'ringkasan':
                return view('project.ringkasan.ringkasan', compact('id', 'user', 'role', 'is_submitted', 'is_review', 'status', 'user_id', 'negeri', 'daerah', 'bahagian', 'penyemak', 'penyemak_1', 'penyemak_2', 'pengesah', 'viewOnly', 'peraku'));
                break;

            case 'perakuan':
                return view('project.perakuan.perakuan', compact('id', 'user', 'role', 'is_submitted', 'is_review', 'is_clickable', 'status', 'user_id', 'negeri', 'daerah', 'bahagian', 'penyemak', 'penyemak_1', 'penyemak_2', 'pengesah', 'viewOnly', 'peraku'));
                break;

            default:
                return view('project.daftar.edit.daftar-edit', compact('id', 'is_submitted', 'is_review', 'status', 'user_id', 'negeri', 'daerah', 'bahagian', 'penyemak', 'penyemak_1', 'penyemak_2', 'pengesah', 'viewOnly', 'peraku'));
                break;
        }
    }

    public function setButtonAccess($status, $user_id) //setting submit button access
    {
        $user = Session::get('userType'); //print_r($user);
        $penyemak = Session::get('penyemak');
        $penyemak_1 = Session::get('penyemak_1');
        $penyemak_2 = Session::get('penyemak_2');
        $pengesah = Session::get('pengesah');
        $peraku = Session::get('peraku');

        $is_clickable = 0;

        if ($status == 1 || $status == 5 || $status == 8 || $status == 12 || $status == 15 || $status == 18) {
            if (Auth::user()->id != $user_id) {
                return 0;
            } else {
                return 1;
            }
        }
        if ($user == 1) {
            return 0;
        }
        if ($user == 2) {
            if (($status == 3 && $penyemak == 1) || ($status == 6 && $penyemak_1 == 1)) {
                return 1;
            } else {
                return 0;
            }
        } else if ($user == 3 || $user == 4) {
            if ($status == 3 && $penyemak == 1) {
                return 1;
            } else if ($status == 6 && $penyemak_1 == 1) {
                return 1;
            } else if ($status == 10 && $penyemak_2 == 1) {
                return 1;
            } else if ($status == 13 && $pengesah == 1) {
                return 1;
            } else if ($status == 14 && $peraku == 1) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function setApproveCheckboxAccess($status) //showing checkbox in pop-up
    {
        $user = Session::get('userType'); //print_r($user);
        $role = Session::get('userRole'); //print_r($userRole);exit; 
        $penyemak = Session::get('penyemak');
        $penyemak_1 = Session::get('penyemak_1');
        $penyemak_2 = Session::get('penyemak_2');
        $pengesah = Session::get('pengesah');
        if ($user == 1) {
            return 0;
        } else if ($user == 2) {
            if (($status == 2 && $penyemak == 1) || ($status == 4 && $penyemak_1 == 1)) {
                return 1;
            } else {
                return 0;
            }
        } else if ($user == 3 || $user == 4) {
            if ($status == 2 && $penyemak == 1) //reviewer
            {
                return 1;
            } else if ($status == 4 && $penyemak_1 == 1) //reviewer1
            {
                return 1;
            } else if ($status == 7 && $penyemak_2 == 1) //reviewer2
            {
                return 1;
            } else if ($status == 11 && $pengesah == 1) //validator
            {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function setEnableorDisable($status, $user_id) //enable or disable buttons
    {
        $list = Session::get('list'); //print_r($list);exit;

        $projectType = '';

        if (isset($_COOKIE['cookieName'])) {
            $projectType = $_COOKIE['cookieName'];
        }

        $user = Session::get('userType'); //print_r($user);
        $role = Session::get('userRole'); //print_r($userRole);exit;  
        $penyemak = Session::get('penyemak');
        $penyemak_1 = Session::get('penyemak_1');
        $penyemak_2 = Session::get('penyemak_2');
        $pengesah = Session::get('pengesah');

        if ($status == 1 || $status == 5 || $status == 8 || $status == 12 || $status == 15 || $status == 18) {
            return 1;
        }

        if ($list == 'semak') {
            if ($status == 3 || $status == 6 || $status == 10 || $status == 13 || $status == 14) {
                return 1;
            } else {
                return 0;
            }
        }

        if ($user == 1) {
            return 0;
        }
        if ($user == 2) {
            if ($projectType == "daerah") {
                if ($status == 2 || $status == 4) {
                    return 1;
                } else {
                    return 0;
                }
            } else if (($status == 2 && $penyemak == 1) || ($status == 4 && $penyemak_1 == 1)) { //negeri or daerah
                return 1;
            } else if (Auth::user()->id == $user_id) {
                return 0;
            } else {
                return 0;
            }
        }
        if ($user == 3) {
            if ($projectType == 'daerah' || $projectType == "negeri") {
                if ($status == 7 || $status == 11) {
                    return 1;
                } else {
                    return 0;
                }
            } else if ($status == 2 && $penyemak == 1) {
                return 1;
            } else if ($status == 4 && $penyemak_1 == 1) {
                return 1;
            } else if ($status == 7 && $penyemak_2 == 1) {
                return 1;
            } else if ($status == 11 && $pengesah == 1) {
                return 1;
            } else {
                return 0;
            }
        }
        if ($user == 4) {
            if ($status == 2 && $penyemak == 1) {
                return 1;
            } else if ($status == 4 && $penyemak_1 == 1) {
                return 1;
            } else if ($status == 7 && $penyemak_2 == 1) {
                return 1;
            } else if ($status == 11 && $pengesah == 1) {
                return 1;
            } else {
                return 0;
            }
        }
    }


    public function senaraiMakmalAndMini()
    {
        $user = Session::get('userType'); //print_r($user);
        $userRole = Session::get('userRole'); //print_r($userRole);exit;
        $penyemak = Session::get('penyemak');
        $penyemak_1 = Session::get('penyemak_1');
        $penyemak_2 = Session::get('penyemak_2');
        $pengesah = Session::get('pengesah');
        $negeri = Session::get('negeri_id');
        $daerah = Session::get('daerah_id');
        $bahagian = Session::get('bahagian');
        return view('valueManagement.senaraiVA.senarai_makmal_and_mini', [
            'user' => $user, 'role' => $userRole, 'negeri' => $negeri, 'daerah' => $daerah,
            'bahagian' => $bahagian, 'penyemak' => $penyemak, 'penyemak_1' => $penyemak_1, 'penyemak_2' => $penyemak_2, 'pengesah' => $pengesah
        ]);
    }


    public function KalendarVM()
    {
        return view('valueManagement.KalendarVM.Kalendar');
    }

    // public function newdashboard(){
    //     $token = $this->getToken();
    //     // dd($token);
    //     $link='https://rinm8n4id9eojflo.maps.arcgis.com/apps/webappviewer/index.html#/dc53af74ec194c21abc0009417bcfea4';
    //     $url = $link.'?token='.$token; //print_r($url);exit;
    //     // $name = Auth::user()->name;
    //     return view('project.dashboard.permohonan-project-dashboard',['url'=>$url]);
    // }


    // public function ARCGIS(){
    //     return view('project.dashboard.ARCGIS');
    // }

    public function newpythonscript()
    {
        return view('project.dashboard.newpythonscriptfile');
    }

    public function validationAccessToken(Request $request)
    {
        $token = $request->toArray();
        // dd($token[0]);
        $params = [
            'token' => $token[0],
            'f' => 'json'
        ];
        try {
            $ch = curl_init("https://rinm8n4id9eojflo.maps.arcgis.com/apps/webappviewer/index.html?id=dc53af74ec194c21abc0009417bcfea4");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_CAINFO, "path/to/ca/certificate.pem");
            $response = curl_exec($ch);
            dd($response);
            echo json_decode($response, true);
        } catch (Exception $e) {
            error_log($e->getMessage(), 0);
        }
        // $params = [
        //     'client_id' => "Eg0PDju5clxYEptF",
        //     'client_secret' => "1100d050a03c43d3b04e4d11f0a11817",
        //     'grant_type' => 'client_credentials',
        //     'f' => 'json'
        // ];
        // try {
        //     $ch = curl_init("https://www.arcgis.com/sharing/rest/oauth2/token");
        //     curl_setopt($ch, CURLOPT_POST, true);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($ch, CURLOPT_HEADER, false);
        //     curl_setopt($ch, CURLOPT_CAINFO, "path/to/ca/certificate.pem");
        //     $json = curl_exec($ch);
        //     $response = json_decode($json);
        //     dd($ch);
        //     dd($response);
        //     echo $response->access_token;
        // } catch (Exception $e) {
        //     error_log($e->getMessage(), 0);
        // }



    }
}
