<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//       $GetToken = "https://api-sandbox.tiket.com/apiv1/payexpress?method=getToken&secretkey=56c8624d6a62e1ab22f0d9915ff2d43c&output=json";
//       $TokenJSON=json_decode(file_get_contents($GetToken), true);
//       $token = $TokenJSON['token'];
// $KodeAsal
// $KodeTujuan
// $Tanggal
// $jsonfile = "http://api-sandbox.tiket.com/search/flight?d=".$KodeAsal."&a=".$KodeTujuan."&date=".$Tanggal."&ret_date=2019-05-30&adult=1&child=0&infant=0&token=".$Token."&output=json";
// $data = json_decode(file_get_contents($jsonfile), true);
//
//       dd($data);

return view('frontend.index');
    }
}
