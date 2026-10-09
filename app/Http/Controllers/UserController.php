<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AuditLog;
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

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        AuditLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menambah user',
            'modul' => 'User Management',
            'detail' => 'Menambahkan user ' . $user->name,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil ditambahkan');
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

        AuditLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Mengubah user',
            'modul' => 'User Management',
            'detail' => 'Mengubah data user ' . $user->name,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil diperbarui');
    }


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Cegah menghapus admin terakhir
        if (
            $user->role == 'admin' &&
            User::where('role', 'admin')->count() <= 1
        ) {
            return redirect()
                ->route('users.index')
                ->with('success', 'Admin utama tidak boleh dihapus');
        }

        $userName = $user->name;

        $user->delete();

        AuditLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menghapus user',
            'modul' => 'User Management',
            'detail' => 'Menghapus user ' . $userName,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil dihapus');
    }
}
