<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testAPI extends Controller
{
    function getData(){
        $data = DB::table('finalprojectdb')->get();

        $visitor = $data->pluck('visitor')->toArray();

        return ["visitor" => $visitor];   
    }

    public function updateData(Request $request) //Update database when sensor detect person
    {
        $newVisitorValue = $request->input('visitor');

        // Assuming 'uuid' is a column in your table that represents the unique identifier
        $uuid = \Illuminate\Support\Str::uuid(); // Generate a new UUID
        $timestamp = now();

        DB::table('finalprojectdb')->insert([
            'uuid' => $uuid,
            'visitor' => $newVisitorValue,
            'timestamp' => $timestamp,
            'password' => 1234
        ]);

        return response()->json(['message' => 'Data inserted successfully']);
    }

    public function checkBtn(){
        return DB::table('btnstatus')->where('id',1);
    }
}