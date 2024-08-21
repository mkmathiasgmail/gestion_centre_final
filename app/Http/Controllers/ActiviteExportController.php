<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ActiviteExportController extends Controller
{
    public function indexAction(){
        $spreandsheet= new Spreadsheet();
        $sheet= $spreandsheet->getActiveSheet();

        $sheet->setTitle('');
    }
}
