<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class webview extends Controller
{
    function index(){

        $data=DB::table('finalprojectdb')->get();
        return view('test',['data'=>$data]);
    }

    function btnClicked(){
        $data=DB::table('finalprojectdb')->get();
        $data2=DB::table('btnstatus')->where('id',1)->first();
        
        // $btnori = $data2->onSta?

        if ($data2 && $data2->onStatus == 0) {
            $btn = 1;
        } else {
            $btn = 0;
        }

        DB::table('btnstatus')->where('id', 1)->update(['onStatus' =>$btn]);
        return view('test',['data'=>$data]);
    }
}
