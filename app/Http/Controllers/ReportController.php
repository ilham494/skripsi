<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function casePdf($id)
    {
        $pdf = Pdf::loadHTML('
            <html>
            <body>
                <h1>TEST PDF</h1>
            </body>
            </html>
        ');

        return $pdf->stream('test.pdf');
    }
}