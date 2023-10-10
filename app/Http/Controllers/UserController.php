<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\DataTables\UsersDataTable;
use App\DataTables\TempUsersDataTable;
use DataTables;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return view('users.user_list.userlist');
        //return $dataTable->render('users.index');
    }


    public function indexTemp(TempUsersDataTable $dataTable)
    {
        return $dataTable->render('users.temp');
    }

    // public function index(Request $request)
    // {
    //     //
    //     //if ($request->ajax()) {
    //         $data = \App\Models\User::get();
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function($row){
    //                 $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
    //                 return $actionBtn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     //}
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jabatans = \App\Models\refJabatan::get();
        $bahagians = \App\Models\refBahagian::get();
        $negeris = \App\Models\refNegeri::get();
        $daerahs = \App\Models\refdaerah::get();
        $jawatans = \App\Models\refJawatan::get();
        $gredJawatans = \App\Models\refGredJawatan::get();
        return view('users.create',compact('jabatans','bahagians','negeris','daerahs','jawatans','gredJawatans'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validator($request->all())->validate();

        $this->createData($request->all());

        session()->flash('message', 'Pendaftaran User Berjaya.'); 

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * reset during first time login
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function firstReset()
    {
        //
        $email = Auth::user()->email;        
        return view('auth.passwords.first',compact('email'));
    }    


    public function firstResetUpdate(Request $request)
    {
        //

        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'])->validate();

        $user=User::select('password')->where('email',$request->email)->first();
        

        if (Hash::check($request->get('password'), $user->password)) {

            return back()->with('error', 'Kata laluan baharu tidak boleh sama dengan kata laluan sementara');

        }
        else
        {
            $user = Auth::user();

            $user->password = Hash::make($request->password);

            $user->setRememberToken(Str::random(60));

            $user->first_time = 0;

            $user->save();

            //event(new PasswordReset($user));

            Auth::guard()->login($user);
            // dd($user);
            return redirect()->route('home');

        }
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Approve user registration
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userApproval($id)
    {
        //
        $tempUser = \App\Models\tempUser::whereId($id)->first();
        
        User::create([
            'name' => $tempUser->name,
            'email' => $tempUser->email,
            'password' => $tempUser->password,
            'no_ic' => $tempUser->no_ic,          
            'jenis_pengguna_id' => $tempUser->jenis_pengguna_id,
            'no_telefon' => $tempUser->no_telefon,
            'jawatan_id' => $tempUser->jawatan_id,
            'jabatan_id' => $tempUser->jabatan_id,
            'gred_jawatan_id' => $tempUser->gred_jawatan_id,
            //'kementerian' => $tempUser->kementerian,
            'bahagian_id' => $tempUser->bahagian_id,
            'negeri_id' => $tempUser->negeri_id,
            'daerah_id' => $tempUser->daerah_id,
            'catatan' => $tempUser->catatan,
            'first_time' => $tempUser->first_time,
            'status_pengguna_id' => $tempUser->status_pengguna_id,
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dibuat_oleh' => Auth::user()->id,
            'dikemaskini_pada' => Auth::user()->id,
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $tempUser->delete();
        session()->flash('message', 'Approval for User Berjaya.'); 

        return redirect('home');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_kod_penganalan' => ['required', 'string',  'max:255'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
            'kategori' => ['required', 'integer', 'max:255'],
            'no_telefon' => ['required', 'string', 'max:255'],
            'jawatan' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'gred' => ['required', 'string', 'max:255'],
            'kementerian' => ['required', 'integer', 'max:255'],
            'bahagian' => ['required', 'integer', 'max:255'],
            'negeri' => ['required', 'integer', 'max:255'],
            'daerah' => ['required', 'integer', 'max:255']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createData(array $data)
    {
        return User::create([
            'name' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make('password'),
            'no_ic' => $data['no_kod_penganalan'],            
            'jenis_pengguna_id' => $data['kategori'],
            'no_telefon' => $data['no_telefon'],
            'jawatan_id' => $data['jawatan'],
            'jabatan_id' => $data['jabatan'],
            'gred_jawatan_id' => $data['gred'],
            //'kementerian' => $data['kementerian'],
            'bahagian_id' => $data['bahagian'],
            'negeri_id' => $data['negeri'],
            'daerah_id' => $data['daerah'],
            'catatan' => $data['catatan'],
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }

    public function userlist(){
        $user = Auth::user();
        $roles = $user->roles;
        
        $viewOnly = true;
        if ($user->hasAnyDirectPermission(['pentadbir_userlist_full','pentadbir_userlist_edit'])) {
            $viewOnly = false;
        }
        return view('users.user_list.userlist',compact('viewOnly'));
    }

    public function userlist_demo(){
        return view('userlist_demo');
    }

    public function userProfile($temp,$id)
    {
        $viewOnly=false;
        $user_id = $id;
        $temp_type = $temp;        
        return view('users.user_profile.profile_view',compact('user_id','temp_type','viewOnly'));
    }
    public function Selenggara_Kod_Projek(){
        $user = Auth::user();
        $roles = $user->roles;
        
        $viewOnly = true;
        if ($user->hasAnyDirectPermission(['pentadbir_userlist_full','pentadbir_userlist_edit'])) {
            $viewOnly = false;
        }
        return view('selenggaraviews.kod_projek.Selenggara_Kod_Projek',compact('viewOnly'));
    }

    public function selenggara_map_services(){
        $user = Auth::user();
        $roles = $user->roles;
        
        $viewOnly = true;
        if ($user->hasAnyDirectPermission(['pentadbir_userlist_full','pentadbir_userlist_edit'])) {
            $viewOnly = false;
        }
        return view('selenggaraviews.map_services.selenggara_map_services',compact('viewOnly'));
    }
    public function fectchuser(request $request){
        $id=$request->toArray();
        $user_id=$id["id"];
        $user_data=User::find($user_id);
        $user_data->toArray();
        return redirect('user-profile');
    }
    public function selenggara_dashboard_analisis(){
        $user = Auth::user();
        $roles = $user->roles;
        
        $viewOnly = true;
        if ($user->hasAnyDirectPermission(['pentadbir_selenggara_dashboard_analisis_full','pentadbir_selenggara_dashboard_analisis_edit'])) {
            $viewOnly = false;
        }
        return view('selenggaraviews.dashboard.selenggara_dashboard_analisis',compact('viewOnly'));
    }

    public function selenggara_pengurusan_peranan(){
        $user = Auth::user();
        $roles = $user->roles;
        
        $viewOnly = true;
        if ($user->hasAnyDirectPermission(['pentadbir_selenggara-pengurusan-peranan_full','pentadbir_selenggara-pengurusan-peranan_edit'])) {
            $viewOnly = false;
        }
        return view('users.peranan.list_pengurusan_peranan',compact('viewOnly'));
    }

    public function auditLogs()
    {
        $user = Auth::user();
        $roles = $user->roles;
        
        $viewOnly = true;
        if ($user->hasAnyDirectPermission(['pentadbir_audit-logs_full','pentadbir_audit-logs_edit'])) {
            $viewOnly = false;
        }
        return view('users.audit_logs.audit_logs',compact('viewOnly'));
    }
    public Function pengesahan_pengguna_baharu(){
        $user = Auth::user();
        $roles = $user->roles;
        
        $viewOnly = true;
        if ($user->hasAnyDirectPermission(['pentadbir_pengasahan-pengguna-baharu_full','pentadbir_pengasahan-pengguna-baharu_edit'])) {
            $viewOnly = false;
        }
        return view('users.user_validation.user_validation',compact('viewOnly'));
    }

    public function daftar_pengguna_baharu(){
        $user = Auth::user();
        $roles = $user->roles;
        
        $viewOnly = true;
        if ($user->hasAnyDirectPermission(['pentadbir_daftar-pengguna-baharu_full','pentadbir_daftar-pengguna-baharu_edit'])) {
            $viewOnly = false;
        }
        return view('users.daftar_baharu.daftar_baharu',compact('viewOnly'));
    }

    public function ProjectTrail()
    {
        return view('users.audit_logs.audit_trail.audit');
    }

    public function loginTrail()
    {
        return view('users.audit_logs.login.audit');
    }

    public function registrationTrail()
    {
        return view('users.audit_logs.registration.audit');
    }


    public function switch(Request $request){
        // dd($request->toArray());
        $sessionVar=$request->toArray();
        $isSidebarLock=$sessionVar[0];
        
        Session::put('variableName', $isSidebarLock); 
        return response()->json([
            'code' => '200',
            'status' => 'Success',
            'data' => $isSidebarLock,
        ]);       
    }
    public function Unauthorized(){
        return view('Unauthorized');

    }
}
