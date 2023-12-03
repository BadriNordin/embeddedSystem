<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class clickButton extends Controller
{
    function btnClicked(){
        DB::table('finalprojectdb')->where('uuid', 'e44789bb-5885-4878-b241-75b44601e4c0')->update(['onStatus' => 1]);
        return view('/', [webview::class, 'index']);
    }
}
