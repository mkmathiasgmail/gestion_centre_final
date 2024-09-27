<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Candidat;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteOldQRCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-old-qrcodes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Supprime les QR codes dont la date d\'activité est dépassée';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $candidats = Candidat::leftJoin('activites', 'candidats.activite_id', '=', 'activites.id')
        ->whereDate('activites.start_date', '<=', Carbon::today())
            ->where('candidats.status', 'accept')
            ->select('candidats.*')
            ->get();

        foreach ($candidats as $candidat) {
            if ($candidat->codeqr) {
                $qrCodePath = public_path('app/public/qrcodes/' . basename($candidat->codeqr));
                if (file_exists($qrCodePath)) {
                    unlink($qrCodePath);
                }
                $candidat->codeqr = null;
                $candidat->save();
            }
        }

        $this->info('QR codes supprimés pour les candidats dont l\'activité commence aujourd\'hui.');
    }
}
