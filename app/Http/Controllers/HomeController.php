<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        // $user_is=$user->is_superadmin;
        // $user_id = $user->id;
        // dd($user_is);
        $userAuth = Auth::user();
        $roles = $userAuth->roles;
        
        $viewOnly = false;
        // if ($user->hasAnyDirectPermission(['pentadbir_home_full','pentadbir_home_edit'])) {
        //     $viewOnly = false;
        // }
        
        if($user->tokens->count() == 0) {
            $token = Auth::user()->createToken('user'.$user->id)->plainTextToken;
        }else {
            $user->tokens()->delete();
            $token = $user->createToken('user'.$user->id)->plainTextToken;
        }
        //dd($token);
        
        //return ['token' => $token->plainTextToken];
        if($user->is_superadmin){
            // return view('users.dashboard.home',compact('token','viewOnly'));
            return view('users.dashboard.home',compact('token'));

        }
        else{
            //return view('permohonan-project-dashboard',compact('token'));
            return redirect()->route('permohonan-project-dashboard');
        }

    }


}
