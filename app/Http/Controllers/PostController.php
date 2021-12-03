<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PostController extends Controller
{
    //

    public function index()
    {

        // $a2018 = DB::table('crimes')->select('2014년 계')->where('범죄별', '형법범(건)소계')->get();
        // $t2018 = json_decode(json_encode($a2018), true);
        // return Inertia::render('Index', ['age' => $t2018[0]["2014년 계"]]);



        // $b2018 = DB::table('crimes')->get();
        // $t2018 = json_decode(json_encode($b2018), true);
        // dd(array_values($t2018));


        $b2018 = DB::table('crimes')->get();
        $t2018 = json_decode(json_encode($b2018), true);
        dd($t2018);



        return Inertia::render('Index', ['age' => $t2018]);
    }


    public function chart()
    {

        // $a2018 = DB::table('crimes')->select('2014년 계')->where('범죄별', '형법범(건)소계')->get();
        // $t2018 = json_decode(json_encode($a2018), true);
        // return Inertia::render('Index', ['age' => $t2018[0]["2014년 계"]]);



        // $b2018 = DB::table('crimes')->get();
        // $t2018 = json_decode(json_encode($b2018), true);
        // dd(array_values($t2018));


        $b2018 = DB::table('crimes')->get();
        $t2018 = json_decode(json_encode($b2018), true);
        // dd($t2018);



        return Inertia::render('Chart', ['age' => $t2018]);
    }
}
