<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hearing;
use App\Models\LegalCase;
use App\Models\AuditLog;

class HearingController extends Controller
{
    public function index()
    {
        $hearings = Hearing::with('legalCase')
            ->latest('tanggal_sidang')
            ->get();

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
            'jam' => 'required',
            'tempat' => 'required',
            'agenda' => 'required',
            'status' => 'required',
            'hasil_persidangan' => 'nullable|string',
        ]);

        $hearing = Hearing::create([
            'legal_case_id' => $request->legal_case_id,
            'tanggal_sidang' => $request->tanggal_sidang,
            'jam' => $request->jam,
            'tempat' => $request->tempat,
            'agenda' => $request->agenda,
            'status' => $request->status,
            'hasil_persidangan' => $request->hasil_persidangan,
        ]);

        AuditLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menambah sidang',
            'modul' => 'Hearing',
            'detail' => 'Menambahkan agenda sidang ' . $hearing->agenda,
        ]);

        return redirect()
            ->route('hearings.index')
            ->with('success', 'Agenda sidang berhasil ditambahkan.');
    }


    public function show(string $id)
    {
        $hearing = Hearing::with('legalCase')
            ->findOrFail($id);

        return view('hearings.show', compact('hearing'));
    }


    public function edit(string $id)
    {
        $hearing = Hearing::findOrFail($id);

        $cases = LegalCase::all();

        return view('hearings.edit', compact(
            'hearing',
            'cases'
        ));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'legal_case_id' => 'required',
            'tanggal_sidang' => 'required|date',
            'jam' => 'required',
            'tempat' => 'required',
            'agenda' => 'required',
            'status' => 'required',
            'hasil_persidangan' => 'nullable|string',
        ]);

        $hearing = Hearing::findOrFail($id);

        $hearing->update([
            'legal_case_id' => $request->legal_case_id,
            'tanggal_sidang' => $request->tanggal_sidang,
            'jam' => $request->jam,
            'tempat' => $request->tempat,
            'agenda' => $request->agenda,
            'status' => $request->status,
            'hasil_persidangan' => $request->hasil_persidangan,
        ]);

        AuditLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Mengubah sidang',
            'modul' => 'Hearing',
            'detail' => 'Mengubah agenda sidang ' . $hearing->agenda,
        ]);

        return redirect()
            ->route('hearings.index')
            ->with('success', 'Agenda sidang berhasil diperbarui.');
    }


    public function destroy(string $id)
    {
        $hearing = Hearing::findOrFail($id);

        $agenda = $hearing->agenda;

        $hearing->delete();

        AuditLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menghapus sidang',
            'modul' => 'Hearing',
            'detail' => 'Menghapus agenda sidang ' . $agenda,
        ]);

        return redirect()
            ->route('hearings.index')
            ->with('success', 'Agenda sidang berhasil dihapus.');
    }
}
