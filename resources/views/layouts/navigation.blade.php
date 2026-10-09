<nav
    x-data="{ open: false }"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-slate-200"
>
    <div class="flex flex-col h-full">

        {{-- Logo --}}
        <div class="h-20 flex items-center px-6 border-b border-slate-100">

            <a
                href="{{ route('dashboard') }}"
                class="flex items-center gap-3"
            >
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Logo Sistem Informasi Hukum"
                    class="h-10 w-auto object-contain"
                >

                <div>
                    <div class="font-bold text-slate-900">
                        {{ config('app.name', 'ODS Law Firm') }}
                    </div>

                    <div class="text-xs text-slate-400">
                        Sistem Informasi Hukum
                    </div>
                </div>
            </a>

        </div>


        {{-- Navigation --}}
        <div class="flex-1 px-4 py-6 overflow-y-auto">

            <div class="space-y-1">

                {{-- Dashboard --}}
                <a
                    href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                    {{ request()->routeIs('dashboard')
                        ? 'bg-blue-50 text-blue-700'
                        : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                >

                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M3 12l9-9 9 9M5 10v10h14V10M9 20v-6h6v6"
                        />
                    </svg>

                    <span>Dashboard</span>

                </a>


                {{-- ADMIN --}}
                @if(auth()->user()->role == 'admin')

                    {{-- User Management --}}
                    <a
                        href="{{ route('users.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('users.*')
                            ? 'bg-blue-50 text-blue-700'
                            : 'text-slate-600 hover:bg-slate-50' }}"
                    >
                        <span>👥</span>
                        <span>User Management</span>
                    </a>


                    {{-- Klien --}}
                    <a
                        href="{{ route('clients.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('clients.*')
                            ? 'bg-blue-50 text-blue-700'
                            : 'text-slate-600 hover:bg-slate-50' }}"
                    >
                        <span>👤</span>
                        <span>Klien</span>
                    </a>


                    {{-- Perkara --}}
                    <a
                        href="{{ route('cases.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('cases.*')
                            ? 'bg-blue-50 text-blue-700'
                            : 'text-slate-600 hover:bg-slate-50' }}"
                    >
                        <span>⚖️</span>
                        <span>Perkara</span>
                    </a>


                    {{-- Lawyer --}}
                    <a
                        href="{{ route('lawyers.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('lawyers.*')
                            ? 'bg-blue-50 text-blue-700'
                            : 'text-slate-600 hover:bg-slate-50' }}"
                    >
                        <span>🧑‍⚖️</span>
                        <span>Lawyer</span>
                    </a>


                    {{-- Dokumen --}}
                    <a
                        href="{{ route('documents.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('documents.*')
                            ? 'bg-blue-50 text-blue-700'
                            : 'text-slate-600 hover:bg-slate-50' }}"
                    >
                        <span>📄</span>
                        <span>Dokumen</span>
                    </a>


                    {{-- Agenda Sidang --}}
                    <a
                        href="{{ route('hearings.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('hearings.*')
                            ? 'bg-blue-50 text-blue-700'
                            : 'text-slate-600 hover:bg-slate-50' }}"
                    >
                        <span>📅</span>
                        <span>Agenda Sidang</span>
                    </a>


                    {{-- Audit Log --}}
                    <a
                        href="{{ route('audit.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('audit.*')
                            ? 'bg-blue-50 text-blue-700'
                            : 'text-slate-600 hover:bg-slate-50' }}"
                    >
                        <span>📋</span>
                        <span>Audit Log</span>
                    </a>

                @endif


                {{-- LAWYER --}}
                @if(auth()->user()->role == 'lawyer')

                    {{-- Perkara --}}
                    <a
                        href="{{ route('cases.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('cases.*')
                            ? 'bg-blue-50 text-blue-700'
                            : 'text-slate-600 hover:bg-slate-50' }}"
                    >
                        <span>⚖️</span>
                        <span>Perkara</span>
                    </a>


                    {{-- Dokumen --}}
                    <a
                        href="{{ route('documents.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('documents.*')
                            ? 'bg-blue-50 text-blue-700'
                            : 'text-slate-600 hover:bg-slate-50' }}"
                    >
                        <span>📄</span>
                        <span>Dokumen</span>
                    </a>


                    {{-- Agenda Sidang --}}
                    <a
                        href="{{ route('hearings.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('hearings.*')
                            ? 'bg-blue-50 text-blue-700'
                            : 'text-slate-600 hover:bg-slate-50' }}"
                    >
                        <span>📅</span>
                        <span>Agenda Sidang</span>
                    </a>

                @endif


                {{-- STAFF --}}
                @if(auth()->user()->role == 'staff')

                    {{-- Klien --}}
                    <a
                        href="{{ route('clients.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('clients.*')
                            ? 'bg-blue-50 text-blue-700'
                            : 'text-slate-600 hover:bg-slate-50' }}"
                    >
                        <span>👤</span>
                        <span>Klien</span>
                    </a>


                    {{-- Dokumen --}}
                    <a
                        href="{{ route('documents.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('documents.*')
                            ? 'bg-blue-50 text-blue-700'
                            : 'text-slate-600 hover:bg-slate-50' }}"
                    >
                        <span>📄</span>
                        <span>Dokumen</span>
                    </a>


                    {{-- Agenda Sidang --}}
                    <a
                        href="{{ route('hearings.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('hearings.*')
                            ? 'bg-blue-50 text-blue-700'
                            : 'text-slate-600 hover:bg-slate-50' }}"
                    >
                        <span>📅</span>
                        <span>Agenda Sidang</span>
                    </a>

                @endif

            </div>

        </div>


        {{-- User Area --}}
        <div class="border-t border-slate-100 p-4">

            <div class="flex items-center gap-3 mb-3">

                <div
                    class="w-10 h-10 rounded-full bg-blue-100 text-blue-700
                    flex items-center justify-center font-semibold"
                >
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <div class="min-w-0">

                    <div class="font-semibold text-sm text-slate-800 truncate">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="text-xs text-slate-400 capitalize">
                        {{ Auth::user()->role }}
                    </div>

                </div>

            </div>


            <div class="space-y-1">

                {{-- Profile --}}
                <a
                    href="{{ route('profile.edit') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg
                    text-sm text-slate-600
                    hover:bg-slate-50 hover:text-slate-900"
                >

                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M5.121 17.804A9 9 0 1118.879 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                    </svg>

                    Profile

                </a>


                {{-- Logout --}}
                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg
                        text-sm text-red-600
                        hover:bg-red-50 transition"
                    >

                        <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"
                            />
                        </svg>

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>
</nav>
