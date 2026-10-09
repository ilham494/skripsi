<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lawyer;
use App\Models\AuditLog;

class LawyerController extends Controller
{
    public function index()
    {
        $lawyers = Lawyer::all();

        return view('lawyers.index', compact('lawyers'));
    }


    public function create()
    {
        return view('lawyers.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $lawyer = Lawyer::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'nomor_izin_advokat' => $request->nomor_izin_advokat,
            'spesialisasi' => $request->spesialisasi,
            'alamat' => $request->alamat,
        ]);

        AuditLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menambah lawyer',
            'modul' => 'Lawyer',
            'detail' => 'Menambahkan data lawyer ' . $lawyer->nama,
        ]);

        return redirect()
            ->route('lawyers.index')
            ->with('success', 'Data lawyer berhasil ditambahkan');
    }


    public function edit(string $id)
    {
        $lawyer = Lawyer::findOrFail($id);

        return view('lawyers.edit', compact('lawyer'));
    }


    public function update(Request $request, string $id)
    {
        $lawyer = Lawyer::findOrFail($id);

        $lawyer->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'nomor_izin_advokat' => $request->nomor_izin_advokat,
            'spesialisasi' => $request->spesialisasi,
            'alamat' => $request->alamat,
        ]);

        AuditLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Mengubah lawyer',
            'modul' => 'Lawyer',
            'detail' => 'Mengubah data lawyer ' . $lawyer->nama,
        ]);

        return redirect()
            ->route('lawyers.index')
            ->with('success', 'Data lawyer berhasil diperbarui');
    }


    public function destroy(string $id)
    {
        $lawyer = Lawyer::findOrFail($id);

        $lawyerName = $lawyer->nama;

        $lawyer->delete();

        AuditLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menghapus lawyer',
            'modul' => 'Lawyer',
            'detail' => 'Menghapus data lawyer ' . $lawyerName,
        ]);

        return redirect()
            ->route('lawyers.index')
            ->with('success', 'Data lawyer berhasil dihapus');
    }
}