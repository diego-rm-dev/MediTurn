<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use App\Models\Turn;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\DomPDF;
use Dompdf\Dompdf as DompdfDompdf;

class PDFController extends Controller
{
    public function downloadPDF($turn_number)
    {
        $turn = Turn::where('turn_number', $turn_number)->firstOrFail();
        $specialty = Specialty::find($turn->specialty_id);

        // Crear una nueva instancia de DomPDF
        $pdf = new DompdfDompdf();
        $pdf->loadHtml(view('pdf.turno', [
            'turn_number' => $turn->turn_number,
            'patient_document' => $turn->patient_document,
            'specialty' => $specialty->name
        ])->render());

        $pdf->render();

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'turno_' . $turn->turn_number . '.pdf');
    }
}
