<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\AuditLog;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }


    public function create()
    {
        return view('clients.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $client = Client::create($request->all());

        AuditLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menambah klien',
            'modul' => 'Client',
            'detail' => 'Menambahkan data klien ' . $client->nama,
        ]);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client berhasil ditambahkan');
    }


    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }


    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $client->update($request->all());

        AuditLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Mengubah klien',
            'modul' => 'Client',
            'detail' => 'Mengubah data klien ' . $client->nama,
        ]);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client berhasil diperbarui');
    }


    public function destroy(Client $client)
    {
        $clientName = $client->nama;

        $client->delete();

        AuditLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menghapus klien',
            'modul' => 'Client',
            'detail' => 'Menghapus data klien ' . $clientName,
        ]);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client berhasil dihapus');
    }
}
