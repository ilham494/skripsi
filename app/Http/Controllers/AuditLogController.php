<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index(Request $request)
    {
        $query = AuditLog::with('user');

        // Search aktivitas atau detail
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('aktivitas', 'like', '%' . $search . '%')
                  ->orWhere('detail', 'like', '%' . $search . '%');
            });
        }

        // Filter user
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Filter modul
        if ($request->filled('modul')) {
            $query->where('modul', $request->modul);
        }

        $logs = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        // Data untuk dropdown user
        $users = User::orderBy('name')->get();

        // Data modul yang tersedia di audit log
        $modules = AuditLog::query()
            ->whereNotNull('modul')
            ->where('modul', '!=', '')
            ->distinct()
            ->orderBy('modul')
            ->pluck('modul');

        return view('audit.index', compact(
            'logs',
            'users',
            'modules'
        ));
    }
}
