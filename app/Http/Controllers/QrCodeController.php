<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QrCodeController extends Controller
{
    public function index(Request $request)
    {
        $ipaddress = env('IP_ADDRESS');
        $code = QrCode::size(300)->generate($ipaddress);
        return view('presences.index', ['code' => $code]);
    }
    public function generateQrCode($id)
    {

        $candidat = Candidat::find($id);
        $candidatId = $candidat->id;
        $url = env('IP_QRCODE');
 
        $code = QrCode::size(300)->generate("$url/$id");
        // return $code;
        return view('presences.enregistrement', compact('candidat', 'id', 'code'));
    }

    public function store($id)
    {

        $candidat = Candidat::find($id);
        $candidatId = $candidat->id;


        $presence = new Presence;
        $presence->candidat_id = $candidatId;
        $presence->date = now();
        $presence->save();
        return view('presences.confirmation');
    }
}

    // public function generateQrCode($id)
    // {

    //     $candidat = Candidat::find($id);

    //     if (!$candidat) {
    
    //         return response()->json(['error' => 'Candidate not found'], 404);
    //     }

    //     $url = env('IP_QRCODE') . '/' . $candidat->id; 
    //     $qrCodePath = 'qrcodes/' . $candidat->id . '.png';
    //     QrCode::size(300)->generate($url, public_path($qrCodePath));
    //     $this->sendQrCodeEmail($candidat, $qrCodePath);
        

    //     return view('presences.enregistrement', compact('candidat', 'qrCodePath','id'));
    // }

    // public function sendQrCodeEmail($candidat, $qrCodeSvg)
    // {
    //     $data = [
    //         'name' => $candidat->odcuser->first_name,
    //         'qrCodeSvg' => $qrCodeSvg,
    //     ];
   
    //     Mail::send('emails.qrcode', $data, function ($message) use ($candidat, $qrCodeSvg) {
    //         $message->to($candidat->odcuser->email,$candidat->odcuser->first_name)
    //             ->subject('Your QR Code')
    //             ->attach(public_path($qrCodeSvg));

    //     });
       
    // }

