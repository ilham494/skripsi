<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;

class ReportController extends Controller
{
    public function casePdf($id)
    {
        $case = LegalCase::with([
            'client',
            'lawyer',
            'documents',
            'hearings',
        ])->findOrFail($id);

        return view('reports.case-pdf', [
            'case' => $case,
        ]);
    }
}
