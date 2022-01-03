<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class ServiceController extends Controller
{
    //


    public function question()
    {

        $posts = Post::all();

        $dArray = [];
        for ($i = 0; $i <= 15; $i++) {

            ${"post" . $i} = DB::table('posts')->select()->where('region', $i)->paginate(5);
            array_push($dArray, ${"post" . $i});
        }

        //php 에서 문자열 더하기는 . 이용
        //유동적 변수 생성시 {} 안에 "이름".$변수 사용.

        // dd($dArray);

        return Inertia::render('Question', ['posts' => $posts, 'dArray' => $dArray]);
    }

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
        //json
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

        $posts = Post::latest()->get();


        return Inertia::render('Chart', ['age' => $t2018, 'posts' => $posts]);
    }


    public function map()
    {
        $b2018 = DB::table('crimes')->get();
        $crimeData = json_decode(json_encode($b2018), true);

        // dd($crimeData);


        return Inertia::render('Map2', ['crimeData' => $crimeData]);
    }

    public function dataTest()
    {
        // $testData = Http::get('https://www.crimestats.or.kr/openapi/Sttsapitbldata.do?STATBL_ID=T187583000501945&DTACYCLE_CD=YY&WRTTIME_IDTFR_ID=2017?STATBL_ID=T183153017304927&DTACYCLE_CD=YY&WRTTIME_IDTFR_ID=2019&ITM_ID=10003&CLS_ID=50003');

        $testData = Http::get('https://www.crimestats.or.kr/openapi/Sttsapitbldata.do?STATBL_ID=T187583000501945&DTACYCLE_CD=YY&WRTTIME_IDTFR_ID=2017?STATBL_ID=T187583017578361&ITM_ID=10001&CLS_ID=50003');



        $xmlData = simplexml_load_string($testData);

        //simplexml_load_string()은 SimpleXMLElement 개체에 잘 구성된 XML 문자열의 형태로 변환
        $jsonData = json_encode($xmlData);

        // dd($jsonData);

        $arrayData = json_decode($jsonData, TRUE);

        // dd($arrayData['body']['items']);
        dd($arrayData);

        //https://www.crimestats.or.kr/portal/openapi/selectServicePage.do
        //api주소

        //https://getbootstrap.com/docs/4.0/content/tables/ table참조

        //질문한것 답변참고, 데이터가 5줄밖에없다.
    }
}
