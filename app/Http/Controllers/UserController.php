<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'password' => 'required|min:8',

            'role' => 'required'

        ]);


        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'role' => $request->role

        ]);


        return redirect()
            ->route('users.index')
            ->with('success','User berhasil ditambahkan');

    }



    public function edit(string $id)
    {

        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));

    }



    public function update(Request $request, string $id)
    {

        $user = User::findOrFail($id);


        $request->validate([

            'name' => 'required',

            'email' => 'required|email',

            'role' => 'required'

        ]);


        $user->update([

            'name' => $request->name,

            'email' => $request->email,

            'role' => $request->role

        ]);


        return redirect()
            ->route('users.index')
            ->with('success','User berhasil diperbarui');

    }



    public function destroy(string $id)
    {

        $user = User::findOrFail($id);


        // Cegah menghapus admin terakhir
        if(
            $user->role == 'admin' &&
            User::where('role','admin')->count() <= 1
        ){

            return redirect()
                ->route('users.index')
                ->with('success','Admin utama tidak boleh dihapus');

        }


        $user->delete();


        return redirect()
            ->route('users.index')
            ->with('success','User berhasil dihapus');

    }

}