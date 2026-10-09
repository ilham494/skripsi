<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\LegalCase;
use App\Models\AuditLog;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('legalCase')->get();

        return view('documents.index', compact('documents'));
    }


    public function create()
    {
        $cases = LegalCase::all();

        return view('documents.create', compact('cases'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'legal_case_id' => 'required',
            'nama_dokumen' => 'required',
            'file' => 'required|file|max:5120',
        ]);

        $file = $request->file('file');

        $path = $file->store(
            'documents',
            'public'
        );

        $document = Document::create([
            'legal_case_id' => $request->legal_case_id,
            'nama_dokumen' => $request->nama_dokumen,
            'file' => $path,
            'keterangan' => $request->keterangan,
        ]);

        AuditLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menambah dokumen',
            'modul' => 'Document',
            'detail' => 'Menambahkan dokumen ' . $document->nama_dokumen,
        ]);

        return redirect()
            ->route('documents.index')
            ->with('success', 'Dokumen berhasil ditambahkan');
    }


    public function destroy(string $id)
    {
        $document = Document::findOrFail($id);

        $documentName = $document->nama_dokumen;

        $document->delete();

        AuditLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menghapus dokumen',
            'modul' => 'Document',
            'detail' => 'Menghapus dokumen ' . $documentName,
        ]);

        return redirect()
            ->route('documents.index')
            ->with('success', 'Dokumen berhasil dihapus');
    }
}