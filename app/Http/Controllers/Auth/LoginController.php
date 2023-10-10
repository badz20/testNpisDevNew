<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Send the response after the user was authenticated.
     * Remove the other sessions of this user.
     *
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {                
            $firstTime = Auth::user()->first_time;
            //$this->setUserType();
            $this->setUserTypeWithRole();


            if(Auth::user()->row_status == 0 || Auth::user()->status_pengguna_id == 0) {
                $this->guard()->logout();

                $request->session()->invalidate();

                return throw ValidationException::withMessages([
                    'error' => 'User tidak aktif',
                ]);
            }

            //dd($firstTime);
            if($firstTime) {                        
                return redirect()->route('first.reset');
            }else {    
                // var_dump($request->all());
                // exit();
                $request->session()->regenerate();
                $previous_session = Auth::User()->two_factor_secret;
                if ($previous_session) {
                    Session::getHandler()->destroy($previous_session);
                }

                Auth::user()->two_factor_secret = Session::getId();
                Auth::user()->updated_at = now();
                Auth::user()->save();
                

                event(
                    new \App\Events\UserLoggingAudit(
                        Auth::user(),
                        $request,
                        1,
                    )
                    );
                $this->clearLoginAttempts($request);

                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'user' => $this->guard()->user(),
                    ]);
                }

                return $this->authenticated($request, $this->guard()->user())
                    ?: redirect()->intended($this->redirectPath());
            }
            
        //}
        
    }

        /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {        
        $user = Auth::user();
        Auth::user()->updated_at = now();
        $user->two_factor_secret = null;
        $user->save();

        event(
            new \App\Events\UserLoggingAudit(
                Auth::user(),
                $request,
                0,
            ));
        //$user->tokens()->delete();
        $this->guard()->logout();

        

        $request->session()->invalidate();

        return redirect('/');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $username = $request->only($this->username());
        
        $rules = [];
        $rules['password'] = 'required|string';

        if($request->type == 'jps'){
            $rules[$this->username()] = 'required';
        }else {
            $rules[$this->username()] = 'required|email';
        }
        
        $userType = \App\Models\User::where($this->username(), $username[$this->username()])
                        ->with('jenisPengguna')
                        ->first();
                        
        if($userType) {
            if($userType->jenisPengguna->kod_jenis_pengguna == 1 && $this->username() != 'no_ic'){
                //return $this->sendFailedLoginResponse($request);
                return throw ValidationException::withMessages([
                    'error' => 'Sila masukkan No Kad Pengenalan dan Kata Laluan yang betul',
                ]);
            }

            if($userType->jenisPengguna->kod_jenis_pengguna == 2 && $this->username() != 'email'){
                //return $this->sendFailedLoginResponse($request);
                return throw ValidationException::withMessages([
                    'error' => 'Sila masukkan Alamat Emel dan Kata Laluan yang betul',
                ]);
            }
            
        }

        $this->validate($request, $rules);
        // $this->validate($request, [
        //     $this->username() => 'required|string',
        //     'password' => 'required|string',
        // ]);
    }

     /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        //return 'email';
        // dd($field);
        $field = (filter_var(request()->email, FILTER_VALIDATE_EMAIL) || !request()->email) ? 'email' : 'no_ic';
        // dd($field);
        request()->merge([$field => request()->email]);
        
        return $field;

    }

    public function setUserTypeWithRole()
    {
                    $user = Auth::user(); 

                    Session::put('userRole', "0");
        
                    if($user->negeri_id){Session::put("negeri_id",$user->negeri_id); } else {Session::put("negeri_id","0");}
                    if($user->daerah_id){Session::put("daerah_id",$user->daerah_id); } else {Session::put("daerah_id","0");}
                    if($user->bahagian_id){Session::put("bahagian",$user->bahagian_id);} else {Session::put("bahagian","0");}

                    $result_bkor = DB::table('ref_bahagian')->select('id')->where('acym','BKOR')->first();
                    $result_bpk = DB::table('ref_bahagian')->select('id')->where('acym','BPK')->first(); //print_r($result_bpk);
                    $result_data = $this->getUserroleByType($user->id); 

                    $penyedia=Session::get('penyedia'); 
                    $penyemak=Session::get('penyemak'); 
                    $penyemak_1=Session::get('penyemak_1'); 
                    $penyemak_2=Session::get('penyemak_2'); 
                    $pengesah=Session::get('pengesah'); 
                    $peraku=Session::get('peraku'); 
                    


                    if($user->user_type_id==1)
                    { //negeri user type
                        Session::put('userType', "2");
                        if($penyemak==1 || $penyemak_1==1)
                        {
                            Session::put('userRole', "2");
                        }
                    }
                    else if($user->user_type_id==2)
                    { //daerah user type
                        Session::put('userType', "1");
                        Session::put('userRole', "1");
                    }
                    else if($user->user_type_id==3)
                    {                 
                        if(($user->bahagian_id==$result_bkor->id) || ($user->bahagian_id==$result_bpk->id))
                        { //bkor user type
                            Session::put('userType', "4");
                            if($penyemak==1 || $penyemak_1==1 || $penyemak_2==1 || $pengesah==1 || $peraku==1)
                            {
                                Session::put('userRole', "4");
                            }
                        }
                        else
                        { //bahagian user
                            Session::put('userType', "3");
                            if($penyemak==1 || $penyemak_1==1 || $penyemak_2==1 || $pengesah==1)
                            {
                                Session::put('userRole', "3");
                            }
                        }
                    }
                    else if($user->user_type_id==4 || ($user->bahagian_id==$result_bpk->id))
                    {
                            Session::put('userType', "4");
                            if($penyemak==1 || $penyemak_1==1 || $penyemak_2==1 || $pengesah==1 || $peraku==1)
                            {
                                Session::put('userRole', "4");
                            }
                    }
                    else
                    { 
                            Session::put('userType', "5");
                            if($penyemak==1 || $penyemak_1==1 || $penyemak_2==1 || $pengesah==1 || $peraku==1)
                            {
                                Session::put('userRole', "5");
                            }
                    }                 
        }

        public function getUserroleByType($id)
        {
            Session::put('penyedia', "0");
            Session::put('penyemak', "0");
            Session::put('penyemak_1', "0");
            Session::put('penyemak_2', "0");
            Session::put('pengesah', "0");
            Session::put('peraku', "0");

            $results = DB::table('model_has_roles')
                        ->where('model_id', '=', $id)
                        ->get();
                        
            for($i=0;$i<count($results);$i++)
            { 
                $result_data=json_decode($results, true);
                if($result_data[$i]['role_id']==2)
                {
                    Session::put('penyemak', "1");
                }

                if($result_data[$i]['role_id']==3)
                {
                    Session::put('penyemak_1', "1");
                }

                if($result_data[$i]['role_id']==4)
                {
                    Session::put('penyemak_2', "1");
                }

                if($result_data[$i]['role_id']==5)
                {
                    Session::put('penyedia', "1");
                }
                if($result_data[$i]['role_id']==6)
                {
                    Session::put('pengesah', "1");
                }
                if($result_data[$i]['role_id']==7)
                {
                    Session::put('peraku', "1");
                }
            }

            return $results;
        }
}
