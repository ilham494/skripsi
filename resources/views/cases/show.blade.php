<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="text-2xl font-bold text-slate-800">
                Detail Perkara
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Informasi lengkap mengenai perkara, dokumen, dan agenda sidang.
            </p>

        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- Top Actions --}}
            <div class="flex flex-col sm:flex-row
                        sm:items-center sm:justify-between
                        gap-3 mb-6">


                {{-- Back --}}
                <a
                    href="{{ route('cases.index') }}"
                    class="inline-flex items-center gap-2
                           text-sm font-semibold text-slate-600
                           hover:text-slate-800
                           transition"
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
                            stroke-width="2"
                            d="M15 19l-7-7 7-7"
                        />

                    </svg>

                    Kembali ke Daftar Perkara

                </a>


                <div class="flex items-center gap-2">


                    {{-- Edit --}}
                    <a
                        href="{{ route('cases.edit', $case->id) }}"
                        class="inline-flex items-center justify-center
                               gap-2 px-4 py-2.5
                               bg-amber-50 hover:bg-amber-100
                               text-amber-700
                               rounded-lg
                               text-sm font-semibold
                               transition"
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
                                stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"
                            />

                        </svg>

                        Edit

                    </a>


                    {{-- Download PDF --}}
                    <a
                        href="{{ route('reports.case.pdf', $case->id) }}"
                        class="inline-flex items-center justify-center
                               gap-2 px-4 py-2.5
                               bg-red-600 hover:bg-red-700
                               text-white
                               rounded-lg
                               text-sm font-semibold
                               transition"
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
                                stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z"
                            />

                        </svg>

                        Download PDF

                    </a>

                </div>

            </div>



            {{-- Informasi Perkara --}}
            <div
                class="bg-white border border-slate-200
                       rounded-xl shadow-sm
                       overflow-hidden mb-6"
            >


                {{-- Card Header --}}
                <div
                    class="px-6 py-5
                           border-b border-slate-200
                           bg-slate-50"
                >

                    <div
                        class="flex flex-col sm:flex-row
                               sm:items-center
                               sm:justify-between
                               gap-3"
                    >


                        <div>

                            <p
                                class="text-xs font-semibold
                                       uppercase tracking-wider
                                       text-slate-400"
                            >
                                Detail Perkara
                            </p>


                            <h3
                                class="text-xl font-bold
                                       text-slate-800 mt-1"
                            >
                                {{ $case->judul_perkara }}
                            </h3>

                        </div>



                        {{-- Status Badge --}}
                        <div>

                            @if($case->status === 'Baru')

                                <span
                                    class="inline-flex items-center
                                           px-3 py-1.5
                                           rounded-lg
                                           bg-blue-50
                                           text-blue-700
                                           text-xs
                                           font-semibold"
                                >

                                    <span
                                        class="w-2 h-2
                                               rounded-full
                                               bg-blue-500
                                               mr-2"
                                    ></span>

                                    Baru

                                </span>


                            @elseif($case->status === 'Berjalan')

                                <span
                                    class="inline-flex items-center
                                           px-3 py-1.5
                                           rounded-lg
                                           bg-amber-50
                                           text-amber-700
                                           text-xs
                                           font-semibold"
                                >

                                    <span
                                        class="w-2 h-2
                                               rounded-full
                                               bg-amber-500
                                               mr-2"
                                    ></span>

                                    Berjalan

                                </span>


                            @elseif($case->status === 'Selesai')

                                <span
                                    class="inline-flex items-center
                                           px-3 py-1.5
                                           rounded-lg
                                           bg-emerald-50
                                           text-emerald-700
                                           text-xs
                                           font-semibold"
                                >

                                    <span
                                        class="w-2 h-2
                                               rounded-full
                                               bg-emerald-500
                                               mr-2"
                                    ></span>

                                    Selesai

                                </span>


                            @else

                                <span
                                    class="inline-flex items-center
                                           px-3 py-1.5
                                           rounded-lg
                                           bg-slate-100
                                           text-slate-600
                                           text-xs
                                           font-semibold"
                                >

                                    {{ $case->status ?: '-' }}

                                </span>

                            @endif

                        </div>

                    </div>

                </div>



                {{-- Detail --}}
                <div class="p-6">

                    <div
                        class="grid grid-cols-1
                               md:grid-cols-2
                               gap-x-8 gap-y-6"
                    >


                        {{-- Klien --}}
                        <div>

                            <p
                                class="text-xs font-semibold
                                       uppercase tracking-wider
                                       text-slate-400 mb-1.5"
                            >
                                Klien
                            </p>


                            <div class="flex items-center gap-3">

                                <div
                                    class="w-10 h-10
                                           rounded-full
                                           bg-blue-100
                                           text-blue-700
                                           flex items-center
                                           justify-center
                                           font-bold
                                           flex-shrink-0"
                                >

                                    {{ strtoupper(substr($case->client->nama ?? 'K', 0, 1)) }}

                                </div>


                                <div>

                                    <p
                                        class="text-sm
                                               font-semibold
                                               text-slate-800"
                                    >
                                        {{ $case->client->nama ?? '-' }}
                                    </p>

                                    <p
                                        class="text-xs
                                               text-slate-400"
                                    >
                                        Klien
                                    </p>

                                </div>

                            </div>

                        </div>



                        {{-- Lawyer --}}
                        <div>

                            <p
                                class="text-xs font-semibold
                                       uppercase tracking-wider
                                       text-slate-400 mb-1.5"
                            >
                                Lawyer
                            </p>


                            @if($case->lawyer)

                                <div
                                    class="flex items-center gap-3"
                                >

                                    <div
                                        class="w-10 h-10
                                               rounded-full
                                               bg-indigo-100
                                               text-indigo-700
                                               flex items-center
                                               justify-center
                                               font-bold
                                               flex-shrink-0"
                                    >

                                        {{ strtoupper(substr($case->lawyer->nama, 0, 1)) }}

                                    </div>


                                    <div>

                                        <p
                                            class="text-sm
                                                   font-semibold
                                                   text-slate-800"
                                        >
                                            {{ $case->lawyer->nama }}
                                        </p>

                                        <p
                                            class="text-xs
                                                   text-slate-400"
                                        >
                                            Lawyer
                                        </p>

                                    </div>

                                </div>


                            @else

                                <p
                                    class="text-sm
                                           text-slate-400"
                                >
                                    Belum ditentukan
                                </p>

                            @endif

                        </div>



                        {{-- Nomor Perkara --}}
                        <div>

                            <p
                                class="text-xs font-semibold
                                       uppercase tracking-wider
                                       text-slate-400 mb-1.5"
                            >
                                Nomor Perkara
                            </p>


                            <p
                                class="text-sm
                                       font-semibold
                                       text-slate-800"
                            >
                                {{ $case->nomor_perkara }}
                            </p>

                        </div>



                        {{-- Status --}}
                        <div>

                            <p
                                class="text-xs font-semibold
                                       uppercase tracking-wider
                                       text-slate-400 mb-1.5"
                            >
                                Status Perkara
                            </p>


                            <p
                                class="text-sm
                                       font-semibold
                                       text-slate-800"
                            >
                                {{ $case->status ?: '-' }}
                            </p>

                        </div>



                        {{-- Judul --}}
                        <div class="md:col-span-2">

                            <p
                                class="text-xs font-semibold
                                       uppercase tracking-wider
                                       text-slate-400 mb-1.5"
                            >
                                Judul Perkara
                            </p>


                            <p
                                class="text-sm
                                       text-slate-700
                                       leading-relaxed"
                            >
                                {{ $case->judul_perkara }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>



            {{-- Dokumen --}}
            <div
                class="bg-white border border-slate-200
                       rounded-xl shadow-sm
                       overflow-hidden mb-6"
            >


                <div
                    class="px-6 py-5
                           border-b border-slate-200"
                >

                    <div class="flex items-center gap-3">

                        <div
                            class="w-10 h-10
                                   rounded-lg
                                   bg-blue-50
                                   flex items-center
                                   justify-center"
                        >

                            <svg
                                class="w-5 h-5 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 3h7l5 5v13H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M14 3v6h5"
                                />

                            </svg>

                        </div>


                        <div>

                            <h3
                                class="text-lg
                                       font-semibold
                                       text-slate-800"
                            >
                                Dokumen
                            </h3>

                            <p
                                class="text-sm
                                       text-slate-400"
                            >
                                Dokumen yang terkait dengan perkara ini.
                            </p>

                        </div>

                    </div>

                </div>



                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead
                            class="bg-slate-50
                                   border-b
                                   border-slate-200"
                        >

                            <tr>

                                <th
                                    class="px-6 py-4
                                           text-left
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wider
                                           text-slate-500"
                                >
                                    Nama Dokumen
                                </th>


                                <th
                                    class="px-6 py-4
                                           text-left
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wider
                                           text-slate-500"
                                >
                                    File
                                </th>

                            </tr>

                        </thead>



                        <tbody
                            class="divide-y
                                   divide-slate-100"
                        >

                            @forelse($case->documents as $document)

                                <tr
                                    class="hover:bg-slate-50
                                           transition-colors
                                           duration-150"
                                >

                                    <td class="px-6 py-4">

                                        <div
                                            class="flex
                                                   items-center
                                                   gap-3"
                                        >

                                            <div
                                                class="w-9 h-9
                                                       rounded-lg
                                                       bg-slate-100
                                                       flex items-center
                                                       justify-center
                                                       flex-shrink-0"
                                            >

                                                <svg
                                                    class="w-4 h-4
                                                           text-slate-500"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                                    />

                                                </svg>

                                            </div>


                                            <span
                                                class="text-sm
                                                       font-medium
                                                       text-slate-700"
                                            >
                                                {{ $document->nama_dokumen }}
                                            </span>

                                        </div>

                                    </td>


                                    <td class="px-6 py-4">

                                        <a
                                            href="{{ asset('storage/'.$document->file) }}"
                                            target="_blank"
                                            class="inline-flex
                                                   items-center
                                                   gap-1.5
                                                   px-3 py-1.5
                                                   rounded-lg
                                                   bg-blue-50
                                                   text-blue-700
                                                   hover:bg-blue-100
                                                   text-xs
                                                   font-semibold
                                                   transition"
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
                                                    stroke-width="2"
                                                    d="M12 10v6m0 0l-3-3m3 3l3-3M5 20h14"
                                                />

                                            </svg>

                                            Download

                                        </a>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="2"
                                        class="px-6 py-12"
                                    >

                                        <div
                                            class="flex flex-col
                                                   items-center
                                                   justify-center
                                                   text-center"
                                        >

                                            <div
                                                class="w-12 h-12
                                                       rounded-full
                                                       bg-slate-100
                                                       flex items-center
                                                       justify-center
                                                       mb-3"
                                            >

                                                <svg
                                                    class="w-6 h-6
                                                           text-slate-400"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                                    />

                                                </svg>

                                            </div>


                                            <p
                                                class="text-sm
                                                       font-semibold
                                                       text-slate-600"
                                            >
                                                Belum Ada Dokumen
                                            </p>


                                            <p
                                                class="text-xs
                                                       text-slate-400
                                                       mt-1"
                                            >
                                                Belum ada dokumen yang terkait dengan perkara ini.
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>



            {{-- Agenda Sidang --}}
            <div
                class="bg-white border border-slate-200
                       rounded-xl shadow-sm
                       overflow-hidden"
            >


                <div
                    class="px-6 py-5
                           border-b border-slate-200"
                >

                    <div class="flex items-center gap-3">

                        <div
                            class="w-10 h-10
                                   rounded-lg
                                   bg-indigo-50
                                   flex items-center
                                   justify-center"
                        >

                            <svg
                                class="w-5 h-5
                                       text-indigo-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                />

                            </svg>

                        </div>


                        <div>

                            <h3
                                class="text-lg
                                       font-semibold
                                       text-slate-800"
                            >
                                Agenda Sidang
                            </h3>


                            <p
                                class="text-sm
                                       text-slate-400"
                            >
                                Jadwal dan agenda persidangan perkara.
                            </p>

                        </div>

                    </div>

                </div>



                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead
                            class="bg-slate-50
                                   border-b
                                   border-slate-200"
                        >

                            <tr>

                                <th
                                    class="px-6 py-4
                                           text-left
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wider
                                           text-slate-500"
                                >
                                    Tanggal
                                </th>


                                <th
                                    class="px-6 py-4
                                           text-left
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wider
                                           text-slate-500"
                                >
                                    Jam
                                </th>


                                <th
                                    class="px-6 py-4
                                           text-left
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wider
                                           text-slate-500"
                                >
                                    Tempat
                                </th>


                                <th
                                    class="px-6 py-4
                                           text-left
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wider
                                           text-slate-500"
                                >
                                    Agenda
                                </th>


                                <th
                                    class="px-6 py-4
                                           text-left
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wider
                                           text-slate-500"
                                >
                                    Status
                                </th>

                            </tr>

                        </thead>



                        <tbody
                            class="divide-y
                                   divide-slate-100"
                        >

                            @forelse($case->hearings as $hearing)

                                <tr
                                    class="hover:bg-slate-50
                                           transition-colors
                                           duration-150"
                                >

                                    <td class="px-6 py-4">

                                        <span
                                            class="text-sm
                                                   font-medium
                                                   text-slate-700"
                                        >
                                            {{ $hearing->tanggal_sidang }}
                                        </span>

                                    </td>


                                    <td class="px-6 py-4">

                                        <span
                                            class="text-sm
                                                   text-slate-600"
                                        >
                                            {{ $hearing->jam }}
                                        </span>

                                    </td>


                                    <td class="px-6 py-4">

                                        <span
                                            class="text-sm
                                                   text-slate-600"
                                        >
                                            {{ $hearing->tempat }}
                                        </span>

                                    </td>


                                    <td class="px-6 py-4">

                                        <span
                                            class="text-sm
                                                   font-medium
                                                   text-slate-700"
                                        >
                                            {{ $hearing->agenda }}
                                        </span>

                                    </td>


                                    <td class="px-6 py-4">

                                        @if($hearing->status === 'Selesai')

                                            <span
                                                class="inline-flex
                                                       items-center
                                                       px-2.5 py-1
                                                       rounded-md
                                                       bg-emerald-50
                                                       text-emerald-700
                                                       text-xs
                                                       font-semibold"
                                            >

                                                <span
                                                    class="w-1.5 h-1.5
                                                           rounded-full
                                                           bg-emerald-500
                                                           mr-2"
                                                ></span>

                                                {{ $hearing->status }}

                                            </span>


                                        @elseif($hearing->status === 'Berjalan')

                                            <span
                                                class="inline-flex
                                                       items-center
                                                       px-2.5 py-1
                                                       rounded-md
                                                       bg-amber-50
                                                       text-amber-700
                                                       text-xs
                                                       font-semibold"
                                            >

                                                <span
                                                    class="w-1.5 h-1.5
                                                           rounded-full
                                                           bg-amber-500
                                                           mr-2"
                                                ></span>

                                                {{ $hearing->status }}

                                            </span>


                                        @else

                                            <span
                                                class="inline-flex
                                                       items-center
                                                       px-2.5 py-1
                                                       rounded-md
                                                       bg-blue-50
                                                       text-blue-700
                                                       text-xs
                                                       font-semibold"
                                            >

                                                <span
                                                    class="w-1.5 h-1.5
                                                           rounded-full
                                                           bg-blue-500
                                                           mr-2"
                                                ></span>

                                                {{ $hearing->status ?: '-' }}

                                            </span>

                                        @endif

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="px-6 py-12"
                                    >

                                        <div
                                            class="flex flex-col
                                                   items-center
                                                   justify-center
                                                   text-center"
                                        >

                                            <div
                                                class="w-12 h-12
                                                       rounded-full
                                                       bg-slate-100
                                                       flex items-center
                                                       justify-center
                                                       mb-3"
                                            >

                                                <svg
                                                    class="w-6 h-6
                                                           text-slate-400"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2v12a2 2 0 002 2z"
                                                    />

                                                </svg>

                                            </div>


                                            <p
                                                class="text-sm
                                                       font-semibold
                                                       text-slate-600"
                                            >
                                                Belum Ada Agenda Sidang
                                            </p>


                                            <p
                                                class="text-xs
                                                       text-slate-400
                                                       mt-1"
                                            >
                                                Belum ada agenda sidang untuk perkara ini.
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


        </div>

    </div>

</x-app-layout>
