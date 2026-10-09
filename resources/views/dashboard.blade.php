<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">
                Dashboard
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Ringkasan aktivitas Law Firm
            </p>
        </div>
    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- ============================= --}}
            {{-- STATISTICS --}}
            {{-- ============================= --}}

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">


                {{-- CLIENTS --}}
                <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Total Klien
                            </p>

                            <p class="mt-2 text-3xl font-bold text-slate-900">
                                {{ $totalClients }}
                            </p>
                        </div>

                        <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">

                            <svg
                                class="w-6 h-6 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-5a4 4 0 11-8 0 4 4 0 018 0zm6 1a3 3 0 10-6 0"
                                />
                            </svg>

                        </div>

                    </div>

                    <div class="mt-4 text-xs text-slate-400">
                        Data klien terdaftar
                    </div>

                </div>


                {{-- CASES --}}
                <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Total Perkara
                            </p>

                            <p class="mt-2 text-3xl font-bold text-slate-900">
                                {{ $totalCases }}
                            </p>
                        </div>

                        <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center">

                            <svg
                                class="w-6 h-6 text-emerald-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M12 3l8 4v5c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V7l8-4z"
                                />

                            </svg>

                        </div>

                    </div>

                    <div class="mt-4 text-xs text-slate-400">
                        Perkara dalam sistem
                    </div>

                </div>


                {{-- LAWYERS --}}
                <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Total Lawyer
                            </p>

                            <p class="mt-2 text-3xl font-bold text-slate-900">
                                {{ $totalLawyers }}
                            </p>
                        </div>

                        <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center">

                            <svg
                                class="w-6 h-6 text-purple-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M8 21h8M12 17v4M7 4h10l2 4H5l2-4zm-2 4h14l-1 6a6 6 0 01-12 0L5 8z"
                                />
                            </svg>

                        </div>

                    </div>

                    <div class="mt-4 text-xs text-slate-400">
                        Lawyer terdaftar
                    </div>

                </div>


                {{-- HEARINGS --}}
                <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Agenda Sidang
                            </p>

                            <p class="mt-2 text-3xl font-bold text-slate-900">
                                {{ $totalHearings }}
                            </p>
                        </div>

                        <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center">

                            <svg
                                class="w-6 h-6 text-red-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M8 2v4m8-4v4M3 10h18M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"
                                />
                            </svg>

                        </div>

                    </div>

                    <div class="mt-4 text-xs text-slate-400">
                        Total agenda sidang
                    </div>

                </div>

            </div>



            {{-- ============================= --}}
            {{-- TODAY HEARINGS --}}
            {{-- ============================= --}}

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-100">

                    <div class="flex items-center justify-between">

                        <div>

                            <h3 class="text-lg font-bold text-slate-900">
                                Reminder Sidang Hari Ini
                            </h3>

                            <p class="text-sm text-slate-500 mt-1">
                                Agenda persidangan yang berlangsung hari ini
                            </p>

                        </div>

                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center">

                            <svg
                                class="w-5 h-5 text-red-500"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M8 2v4m8-4v4M3 10h18M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"
                                />
                            </svg>

                        </div>

                    </div>

                </div>


                @if($todayHearings->count())

                    <div class="overflow-x-auto">

                        <table class="w-full text-sm">

                            <thead class="bg-slate-50">

                                <tr>

                                    <th class="px-6 py-3 text-left font-semibold text-slate-500">
                                        Perkara
                                    </th>

                                    <th class="px-6 py-3 text-left font-semibold text-slate-500">
                                        Jam
                                    </th>

                                    <th class="px-6 py-3 text-left font-semibold text-slate-500">
                                        Tempat
                                    </th>

                                    <th class="px-6 py-3 text-left font-semibold text-slate-500">
                                        Agenda
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-slate-100">

                                @foreach($todayHearings as $hearing)

                                    <tr class="hover:bg-slate-50 transition">

                                        <td class="px-6 py-4 font-medium text-slate-800">
                                            {{ $hearing->case->judul_perkara ?? '-' }}
                                        </td>

                                        <td class="px-6 py-4 text-slate-600">
                                            {{ $hearing->jam }}
                                        </td>

                                        <td class="px-6 py-4 text-slate-600">
                                            {{ $hearing->tempat }}
                                        </td>

                                        <td class="px-6 py-4 text-slate-600">
                                            {{ $hearing->agenda }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="p-6">

                        <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-xl p-4">

                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                />
                            </svg>

                            <span class="text-sm font-medium">
                                Tidak ada sidang hari ini.
                            </span>

                        </div>

                    </div>

                @endif

            </div>



            {{-- ============================= --}}
            {{-- TWO COLUMNS --}}
            {{-- ============================= --}}

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-6">


                {{-- RECENT CASES --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-slate-100">

                        <h3 class="text-lg font-bold text-slate-900">
                            Perkara Terbaru
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            Perkara yang baru ditambahkan
                        </p>

                    </div>


                    <div class="overflow-x-auto">

                        <table class="w-full text-sm">

                            <thead class="bg-slate-50">

                                <tr>

                                    <th class="px-6 py-3 text-left font-semibold text-slate-500">
                                        Nomor
                                    </th>

                                    <th class="px-6 py-3 text-left font-semibold text-slate-500">
                                        Klien
                                    </th>

                                    <th class="px-6 py-3 text-left font-semibold text-slate-500">
                                        Status
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-slate-100">

                                @foreach($recentCases as $case)

                                    <tr class="hover:bg-slate-50 transition">

                                        <td class="px-6 py-4 font-medium text-slate-800">
                                            {{ $case->nomor_perkara }}
                                        </td>

                                        <td class="px-6 py-4 text-slate-600">
                                            {{ $case->client->nama ?? '-' }}
                                        </td>

                                        <td class="px-6 py-4">

                                            <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700">
                                                {{ $case->status }}
                                            </span>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>



                {{-- UPCOMING HEARINGS --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-slate-100">

                        <h3 class="text-lg font-bold text-slate-900">
                            Agenda Sidang Terdekat
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            Jadwal persidangan berikutnya
                        </p>

                    </div>


                    <div class="overflow-x-auto">

                        <table class="w-full text-sm">

                            <thead class="bg-slate-50">

                                <tr>

                                    <th class="px-6 py-3 text-left font-semibold text-slate-500">
                                        Tanggal
                                    </th>

                                    <th class="px-6 py-3 text-left font-semibold text-slate-500">
                                        Perkara
                                    </th>

                                    <th class="px-6 py-3 text-left font-semibold text-slate-500">
                                        Status
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-slate-100">

                                @foreach($upcomingHearings as $hearing)

                                    <tr class="hover:bg-slate-50 transition">

                                        <td class="px-6 py-4 text-slate-600">
                                            {{ $hearing->tanggal_sidang }}
                                        </td>

                                        <td class="px-6 py-4 font-medium text-slate-800">
                                            {{ $hearing->case->judul_perkara ?? '-' }}
                                        </td>

                                        <td class="px-6 py-4">

                                            <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700">
                                                {{ $hearing->status }}
                                            </span>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>



            {{-- ============================= --}}
            {{-- DOCUMENTS --}}
            {{-- ============================= --}}

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-100">

                    <div class="flex items-center justify-between">

                        <div>

                            <h3 class="text-lg font-bold text-slate-900">
                                Dokumen Terbaru
                            </h3>

                            <p class="text-sm text-slate-500 mt-1">
                                Dokumen yang baru ditambahkan ke sistem
                            </p>

                        </div>

                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">

                            <svg
                                class="w-5 h-5 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M7 3h7l5 5v13H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M14 3v6h5"
                                />
                            </svg>

                        </div>

                    </div>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-slate-50">

                            <tr>

                                <th class="px-6 py-3 text-left font-semibold text-slate-500">
                                    Nama Dokumen
                                </th>

                                <th class="px-6 py-3 text-left font-semibold text-slate-500">
                                    File
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">

                            @foreach($recentDocuments as $document)

                                <tr class="hover:bg-slate-50 transition">

                                    <td class="px-6 py-4 font-medium text-slate-800">
                                        {{ $document->nama_dokumen }}
                                    </td>

                                    <td class="px-6 py-4">

                                        <a
                                            href="{{ asset('storage/'.$document->file) }}"
                                            target="_blank"
                                            class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-blue-50 text-blue-700 text-xs font-semibold hover:bg-blue-100 transition"
                                        >

                                            <svg
                                                class="w-4 h-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M12 3v12m0 0l-4-4m4 4l4-4M5 21h14"
                                                />
                                            </svg>

                                            Download

                                        </a>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>


        </div>

    </div>

</x-app-layout>
