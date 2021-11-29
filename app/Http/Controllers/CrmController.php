<?php

namespace App\Http\Controllers;

use App\Authors;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrmController extends Controller
{
    public function index(){
//        $data = Authors::select([
//            DB::raw("count(*) as jumlah"),
////            DB::raw("MONTH(created_at) as mont"),
//            DB::raw("YEAR(created_at) as year"),
//        ])
////            ->whereYear("created_at", "=", "2019")
//            ->groupBy("year")
//            ->orderBy("year", "ASC")
//            ->get();

//        $data = Authors::groupBy("")
////            ->orderBy("year", "ASC")
//            ->get();

//        $data = Authors::select([
//            DB::raw("count(*) as jumlah"),
////            DB::raw("MONTH(created_at) as mont"),
//            DB::raw("DATE(created_at) as year"),
//        ])
//            ->groupBy("year")
//            ->get()
//            ->toArray();
//        dd($data);


//            $data = Authors::selectRaw("DATE(created_at) as data")->get()
//                ->groupBy(function ($query){
//                    return Carbon::parse($query->created_at)->format("Y");
//                })->toArray();

//        $data = Authors::selectRaw("DATE(created_at) as data")->get()
//            ->groupBy(function ($query){
//                return Carbon::parse($query->created_at)->format("Y");
//            })->toArray();

        $data = Carbon::parse(Authors::max("created_at"))->format("Y");
//        dd($data);
        $data2 = Carbon::parse(Authors::min("created_at"))->format("Y");


//        dd(gettype($data2));
        $data3 = (int)$data - (int)$data2;
        dd($data3);
            $da = [];
            foreach ($data as $items => $value){
                $da[]=$items;
            }

        dd($da);

//        $q = Carbon::now()->format("Y");
//        dd($q);
        return view("welcome", compact("data"));
    }

    public function data_tes(Request $request){
        if ($request->has("data_push")){
            $data = Authors::select([
                DB::raw("count(*) as jumlah"),
                DB::raw("MONTH(created_at) as mont"),
//                DB::raw("YEAR(created_at) as year"),
            ])
            ->whereYear("created_at", "=", $request->data_push)
                ->groupBy("mont")
                ->orderBy("mont", "ASC")
                ->get();
//            dd($data);
            $r = [$data,$data,$data];
            $array = [];
            foreach ($r as $ri){
                $result = [];
                for ($i = 0; $i < 12 ; $i++){
                    if ($i+1 != $ri[$i]->mont){
                        $result[] = 0;
                    }else{
                        $result[] = $ri[$i]->jumlah;
                    }
                }
                array_push($array, $result);
            }


            dd($array);

            return $data;
        }
        return view("welcome");
    }
}
