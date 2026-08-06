<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\LegalCase;

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


        Document::create([
            'legal_case_id' => $request->legal_case_id,
            'nama_dokumen' => $request->nama_dokumen,
            'file' => $path,
            'keterangan' => $request->keterangan,
        ]);


        return redirect()
            ->route('documents.index')
            ->with('success','Dokumen berhasil ditambahkan');
    }


    public function destroy(string $id)
    {
        $document = Document::findOrFail($id);

        $document->delete();


        return redirect()
            ->route('documents.index')
            ->with('success','Dokumen berhasil dihapus');
    }
}