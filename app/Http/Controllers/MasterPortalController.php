<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MasterPortalController extends Controller
{
    //

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
        // if ($user->hasAnyDirectPermission(['pentadbir_master/portal_edit','pentadbir_master/portal_full'])) {
        //     $viewOnly = false;
        // }
        return view('masterPortal.index',compact('viewOnly'));
    }
}
