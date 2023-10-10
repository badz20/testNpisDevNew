<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\tempUser;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $jabatans = \App\Models\refJabatan::get();
        $bahagians = \App\Models\refBahagian::get();
        $negeris = \App\Models\refNegeri::get();
        $daerahs = \App\Models\refDaerah::get();
        $jawatans = \App\Models\refJawatan::get();
        $gredJawatans = \App\Models\refGredJawatan::get();
        return view('auth.register',compact('jabatans','bahagians','negeris','daerahs','jawatans','gredJawatans'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        session()->flash('message', 'Pendaftaran Berjaya. Sila tunggu  approval dari kaki tangan untuk log masuk'); 

        return redirect('/');

        // $this->guard()->login($user);

        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());
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
    protected function create(array $data)
    {
        return tempUser::create([
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
}
