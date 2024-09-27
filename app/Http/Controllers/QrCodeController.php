<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Candidat;
use App\Models\Presence;
use Choowx\RasterizeSvg\Svg;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function index(Request $request)
    {
        $ipaddress = env('IP_ADDRESS');
        $code = QrCode::size(300)->generate($ipaddress);
        return view('presences.index', ['code' => $code]);
    }
    public function generercodeqr($id)
    {
        $candidatsAccept = Candidat::leftJoin('activites', 'candidats.activite_id', '=', 'activites.id')
            ->where('candidats.status', 'accept')
            ->where('activites.id', $id)
            ->select('candidats.*')
            ->get();
        if (!$candidatsAccept->isEmpty()) {
            foreach ($candidatsAccept as $candidat) {
                $candidatId = $candidat->id;
                $url = env('IP_QRCODE');
                $svgString = QrCode::size(300)->generate("$url/$candidatId");
                $directory = 'app/public/qrcodes';
                if (!is_dir($directory)) {
                    mkdir($directory, 0755, true);
                }
                $imagePath = "$directory/qrcode_$candidatId.png";
                $image = Svg::make($svgString);
                $image->saveAsWebp($imagePath);
                $candidat->codeqr = $imagePath;
                $candidat->save();
            }
            return redirect()->back()->with('success', 'QR Codes générés avec succès.');
        } else {
            return redirect()->back()->with('success', 'Pas de participant pour cette activite, donc pas moyen de generer le qrcode!');
        }
    }
    public function participant($id)
    {
        $candidat = Candidat::find($id);
        if ($candidat && $candidat->codeqr) {
            $qrCodeUrl = Storage::url($candidat->codeqr);
            return view('presences.enregistrement', compact('candidat', 'qrCodeUrl', 'id'));
        }

    }

    public function store($id)
    {

        $candidat = Candidat::find($id);
        $candidatId = $candidat->id;
        $date = now()->format('Y-m-d');
        $presenceExists = Presence::where('candidat_id', $candidat->id)
            ->whereDate('date', $date)
            ->exists();

        if (!$presenceExists) {
            // Create new presence
            Presence::create([
                'candidat_id' => $candidatId,
                'date' => $date
            ]);
            return view('presences.confirmation');
        } else {
            return back()->with('error', 'Votre presence pour la cette journée existe déjà');
        }
    }
}

   