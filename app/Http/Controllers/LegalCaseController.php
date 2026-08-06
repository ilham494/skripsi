<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LegalCase;
use App\Models\Client;
use App\Models\Lawyer;
use App\Models\AuditLog;


class LegalCaseController extends Controller
{

    public function index(Request $request)
    {

        $query = LegalCase::with([
            'client',
            'lawyer'
        ]);


        // pencarian nomor atau judul
        if($request->search){

            $query->where(function($q) use ($request){

                $q->where('nomor_perkara','like','%'.$request->search.'%')
                  ->orWhere('judul_perkara','like','%'.$request->search.'%');

            });

        }


        // filter status
        if($request->status){

            $query->where('status',$request->status);

        }


        // filter lawyer
        if($request->lawyer_id){

            $query->where('lawyer_id',$request->lawyer_id);

        }



        $cases = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();



        $lawyers = Lawyer::all();



        return view('cases.index', compact(
            'cases',
            'lawyers'
        ));

    }




    public function create()
    {

        $clients = Client::all();

        $lawyers = Lawyer::all();


        return view('cases.create', compact(
            'clients',
            'lawyers'
        ));

    }





    public function store(Request $request)
    {

        $request->validate([

            'client_id'=>'required',

            'nomor_perkara'=>'required',

            'judul_perkara'=>'required',

            'jenis_perkara'=>'required',

            'status'=>'required',

        ]);



        $case = LegalCase::create([

            'client_id'=>$request->client_id,

            'lawyer_id'=>$request->lawyer_id,

            'nomor_perkara'=>$request->nomor_perkara,

            'judul_perkara'=>$request->judul_perkara,

            'jenis_perkara'=>$request->jenis_perkara,

            'status'=>$request->status,

            'tanggal_mulai'=>$request->tanggal_mulai,

            'deskripsi'=>$request->deskripsi,

        ]);



        AuditLog::create([

            'user_id'=>auth()->id(),

            'aktivitas'=>'Menambah perkara',

            'modul'=>'Legal Case',

            'detail'=>'Menambahkan perkara '.$case->judul_perkara,

        ]);



        return redirect()

            ->route('cases.index')

            ->with('success','Perkara berhasil ditambahkan');

    }






    public function show(string $id)
    {

        $case = LegalCase::with([

            'client',

            'lawyer',

            'documents',

            'hearings'

        ])->findOrFail($id);



        return view('cases.show', compact('case'));

    }






    public function edit(string $id)
    {

        $case = LegalCase::findOrFail($id);


        $clients = Client::all();

        $lawyers = Lawyer::all();



        return view('cases.edit', compact(

            'case',

            'clients',

            'lawyers'

        ));

    }







    public function update(Request $request,string $id)
    {

        $request->validate([

            'client_id'=>'required',

            'nomor_perkara'=>'required',

            'judul_perkara'=>'required',

            'jenis_perkara'=>'required',

            'status'=>'required',

        ]);



        $case = LegalCase::findOrFail($id);



        $case->update([

            'client_id'=>$request->client_id,

            'lawyer_id'=>$request->lawyer_id,

            'nomor_perkara'=>$request->nomor_perkara,

            'judul_perkara'=>$request->judul_perkara,

            'jenis_perkara'=>$request->jenis_perkara,

            'status'=>$request->status,

            'tanggal_mulai'=>$request->tanggal_mulai,

            'deskripsi'=>$request->deskripsi,

        ]);



        AuditLog::create([

            'user_id'=>auth()->id(),

            'aktivitas'=>'Mengubah perkara',

            'modul'=>'Legal Case',

            'detail'=>'Mengubah perkara '.$case->judul_perkara,

        ]);



        return redirect()

            ->route('cases.index')

            ->with('success','Perkara berhasil diperbarui');

    }






    public function destroy(string $id)
    {

        $case = LegalCase::findOrFail($id);



        AuditLog::create([

            'user_id'=>auth()->id(),

            'aktivitas'=>'Menghapus perkara',

            'modul'=>'Legal Case',

            'detail'=>'Menghapus perkara '.$case->judul_perkara,

        ]);



        $case->delete();



        return redirect()

            ->route('cases.index')

            ->with('success','Perkara berhasil dihapus');

    }

}