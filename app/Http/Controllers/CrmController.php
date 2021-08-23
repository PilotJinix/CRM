<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrmController extends Controller
{
    public function index(){
        $data = DB::table("authors")->select([
            DB::raw("count(*) as jumlah"),
            DB::raw("DATE(created_at) as tanggal")
        ])
            ->groupBy("tanggal")
            ->get();
        dd($data);
        return view("welcome");
    }

    public function data(){
        return view("welcome");
    }
}
