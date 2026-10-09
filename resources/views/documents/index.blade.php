<x-app-layout>
<x-slot name="header">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">
            Data Dokumen
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Kelola dokumen yang berkaitan dengan perkara.
        </p>
    </div>
</x-slot>


<div class="py-8">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

            <div>
                <h3 class="text-lg font-semibold text-slate-800">
                    Daftar Dokumen
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    Dokumen yang tersimpan dalam sistem.
                </p>
            </div>

            <a href="{{ route('documents.create') }}"
               class="inline-flex items-center justify-center gap-2
                      bg-blue-600 hover:bg-blue-700
                      text-white px-4 py-2.5 rounded-lg
                      text-sm font-semibold
                      shadow-sm transition">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4v16m8-8H4" />

                </svg>

                Tambah Dokumen

            </a>

        </div>


        {{-- Success Message --}}
        @if(session('success'))

            <div class="mb-6 flex items-center gap-3
                        rounded-xl border border-emerald-200
                        bg-emerald-50 px-4 py-3">

                <div class="flex-shrink-0 w-9 h-9 rounded-full
                            bg-emerald-100 flex items-center justify-center">

                    <svg class="w-5 h-5 text-emerald-600"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 13l4 4L19 7" />

                    </svg>

                </div>

                <p class="text-sm font-medium text-emerald-700">
                    {{ session('success') }}
                </p>

            </div>

        @endif


        {{-- Document Table --}}
        <div class="bg-white border border-slate-200
                    rounded-xl shadow-sm overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full min-w-[850px]">

                    <thead class="bg-slate-50 border-b border-slate-200">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-slate-500">
                                Perkara
                            </th>

                            <th class="px-6 py-4 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-slate-500">
                                Nama Dokumen
                            </th>

                            <th class="px-6 py-4 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-slate-500">
                                File
                            </th>

                            <th class="px-6 py-4 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @forelse($documents as $document)

                            <tr class="hover:bg-slate-50 transition-colors duration-150">

                                {{-- Perkara --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-lg
                                                    bg-blue-50 text-blue-600
                                                    flex items-center justify-center
                                                    flex-shrink-0">

                                            <svg class="w-5 h-5"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.414V19a2 2 0 01-2 2z" />

                                            </svg>

                                        </div>

                                        <div class="min-w-0">

                                            <p class="font-semibold text-slate-800 truncate max-w-xs">
                                                {{ $document->legalCase->judul_perkara ?? 'Perkara tidak ditemukan' }}
                                            </p>

                                            @if($document->legalCase)
                                                <p class="text-xs text-slate-400 mt-0.5">
                                                    {{ $document->legalCase->nomor_perkara }}
                                                </p>
                                            @endif

                                        </div>

                                    </div>

                                </td>


                                {{-- Nama Dokumen --}}
                                <td class="px-6 py-4">

                                    <p class="text-sm font-medium text-slate-700">
                                        {{ $document->nama_dokumen }}
                                    </p>

                                </td>


                                {{-- File --}}
                                <td class="px-6 py-4">

                                    @if($document->file)

                                        <a href="{{ asset('storage/'.$document->file) }}"
                                           target="_blank"
                                           class="inline-flex items-center gap-2
                                                  px-3 py-1.5 rounded-lg
                                                  bg-blue-50 hover:bg-blue-100
                                                  text-blue-700
                                                  text-sm font-semibold
                                                  transition">

                                            <svg class="w-4 h-4"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.414V19a2 2 0 01-2 2z" />

                                            </svg>

                                            Lihat File

                                        </a>

                                    @else

                                        <span class="text-sm text-slate-400">
                                            Tidak ada file
                                        </span>

                                    @endif

                                </td>


                                {{-- Aksi --}}
                                <td class="px-6 py-4">

                                    <form method="POST"
                                          action="{{ route('documents.destroy', $document->id) }}">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')"
                                                class="inline-flex items-center gap-2
                                                       px-3 py-1.5 rounded-lg
                                                       bg-red-50 hover:bg-red-100
                                                       text-red-600
                                                       text-sm font-semibold
                                                       transition">

                                            <svg class="w-4 h-4"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h14" />

                                            </svg>

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>


                        @empty

                            {{-- Empty State --}}
                            <tr>

                                <td colspan="4" class="px-6 py-16">

                                    <div class="flex flex-col items-center justify-center text-center">

                                        <div class="w-14 h-14 rounded-full
                                                    bg-slate-100
                                                    flex items-center justify-center mb-4">

                                            <svg class="w-7 h-7 text-slate-400"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.414V19a2 2 0 01-2 2z" />

                                            </svg>

                                        </div>

                                        <h4 class="font-semibold text-slate-700">
                                            Belum Ada Dokumen
                                        </h4>

                                        <p class="text-sm text-slate-400 mt-1 max-w-sm">
                                            Belum ada dokumen yang tersimpan di dalam sistem.
                                        </p>

                                        <a href="{{ route('documents.create') }}"
                                           class="mt-4 text-sm font-semibold text-blue-600 hover:text-blue-700">

                                            + Tambah Dokumen

                                        </a>

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