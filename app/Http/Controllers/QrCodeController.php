<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function index(Request $request)
    {
        $ipaddress=env('IP_ADDRESS');
        $code=QrCode::size(300)->generate( $ipaddress);
        return view('qrCode.index',['code'=>$code]);
    }
}
