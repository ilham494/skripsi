<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hearing;
use App\Models\LegalCase;

class HearingController extends Controller
{
    public function index()
    {
        $hearings = Hearing::with('legalCase')->get();

        return view('hearings.index', compact('hearings'));
    }

    public function create()
    {
        $cases = LegalCase::all();

        return view('hearings.create', compact('cases'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'legal_case_id' => 'required',
            'tanggal_sidang' => 'required|date',
            'agenda' => 'required',
        ]);

        Hearing::create($request->all());

        return redirect()
            ->route('hearings.index')
            ->with('success', 'Agenda sidang berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}