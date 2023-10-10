<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RollingPlan extends Controller
{
    public function Senarai_Peruntukan(){
        return view('RollingPlan.Senarai_Peruntukan.senarai_peruntukan');
    }

    public Function rp_bkor(){
        $id = '';
        return view('RollingPlan.RP_BKOR.rp_bkor',compact('id'));
    }

    public Function rp_bkor_edit($id){
        return view('RollingPlan.RP_BKOR.rp_bkor',compact('id'));
    }
}
