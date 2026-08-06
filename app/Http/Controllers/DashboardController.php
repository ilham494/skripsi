<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\LegalCase;
use App\Models\Lawyer;
use App\Models\Hearing;
use App\Models\Document;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik utama
        $totalClients = Client::count();
        $totalCases = LegalCase::count();
        $totalLawyers = Lawyer::count();
        $totalHearings = Hearing::count();


        // Sidang hari ini
        $todayHearings = Hearing::with('legalCase')
            ->whereDate('tanggal_sidang', today())
            ->orderBy('jam')
            ->get();


        // Perkara terbaru
        $recentCases = LegalCase::with([
                'client',
                'lawyer'
            ])
            ->latest()
            ->take(5)
            ->get();


        // Agenda sidang terdekat
        $upcomingHearings = Hearing::with('legalCase')
            ->whereDate('tanggal_sidang', '>=', now())
            ->orderBy('tanggal_sidang')
            ->orderBy('jam')
            ->take(5)
            ->get();


        // Dokumen terbaru
        $recentDocuments = Document::latest()
            ->take(5)
            ->get();


        return view('dashboard', compact(
            'totalClients',
            'totalCases',
            'totalLawyers',
            'totalHearings',
            'todayHearings',
            'recentCases',
            'upcomingHearings',
            'recentDocuments'
        ));
    }
}