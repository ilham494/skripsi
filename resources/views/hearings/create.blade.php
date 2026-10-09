<x-app-layout>
<x-slot name="header">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">
            Tambah Agenda Sidang
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Tambahkan jadwal dan informasi agenda sidang baru.
        </p>
    </div>
</x-slot>


<div class="py-8">

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Back --}}
        <div class="mb-6">

            <a href="{{ route('hearings.index') }}"
               class="inline-flex items-center gap-2
                      text-sm font-semibold text-slate-600
                      hover:text-slate-800
                      transition">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 19l-7-7 7-7"/>

                </svg>

                Kembali ke Agenda Sidang

            </a>

        </div>


        {{-- Form Card --}}
        <div class="bg-white border border-slate-200
                    rounded-xl shadow-sm overflow-hidden">

            {{-- Card Header --}}
            <div class="px-6 py-5
                        border-b border-slate-200
                        bg-slate-50">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-lg
                                bg-blue-50
                                flex items-center justify-center">

                        <svg class="w-5 h-5 text-blue-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

                        </svg>

                    </div>

                    <div>

                        <h3 class="text-lg font-semibold text-slate-800">
                            Informasi Agenda
                        </h3>

                        <p class="text-sm text-slate-400">
                            Isi detail perkara dan jadwal persidangan.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Form --}}
            <form method="POST"
                  action="{{ route('hearings.store') }}">

                @csrf


                <div class="p-6 space-y-5">


                    {{-- Perkara --}}
                    <div>

                        <label for="legal_case_id"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Perkara

                        </label>


                        <select
                            id="legal_case_id"
                            name="legal_case_id"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('legal_case_id') border-red-400 @enderror">

                            <option value="">
                                -- Pilih Perkara --
                            </option>

                            @foreach($cases as $case)

                                <option
                                    value="{{ $case->id }}"
                                    {{ old('legal_case_id') == $case->id ? 'selected' : '' }}>

                                    {{ $case->nomor_perkara }} - {{ $case->judul_perkara }}

                                </option>

                            @endforeach

                        </select>


                        @error('legal_case_id')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Tanggal Sidang --}}
                    <div>

                        <label for="tanggal_sidang"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Tanggal Sidang

                        </label>


                        <input
                            id="tanggal_sidang"
                            type="date"
                            name="tanggal_sidang"
                            value="{{ old('tanggal_sidang') }}"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('tanggal_sidang') border-red-400 @enderror">


                        @error('tanggal_sidang')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Jam --}}
                    <div>

                        <label for="jam"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Jam

                        </label>


                        <input
                            id="jam"
                            type="time"
                            name="jam"
                            value="{{ old('jam') }}"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('jam') border-red-400 @enderror">


                        @error('jam')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Tempat --}}
                    <div>

                        <label for="tempat"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Tempat

                        </label>


                        <input
                            id="tempat"
                            type="text"
                            name="tempat"
                            value="{{ old('tempat') }}"
                            placeholder="Contoh: Pengadilan Negeri Jakarta Selatan"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   placeholder-slate-400
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('tempat') border-red-400 @enderror">


                        @error('tempat')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Agenda --}}
                    <div>

                        <label for="agenda"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Agenda

                        </label>


                        <input
                            id="agenda"
                            type="text"
                            name="agenda"
                            value="{{ old('agenda') }}"
                            placeholder="Contoh: Pemeriksaan Saksi"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   placeholder-slate-400
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('agenda') border-red-400 @enderror">


                        @error('agenda')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Status --}}
                    <div>

                        <label for="status"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Status

                        </label>


                        <select
                            id="status"
                            name="status"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('status') border-red-400 @enderror">

                            <option value="Terjadwal"
                                {{ old('status', 'Terjadwal') == 'Terjadwal' ? 'selected' : '' }}>
                                Terjadwal
                            </option>

                            <option value="Selesai"
                                {{ old('status') == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                            <option value="Ditunda"
                                {{ old('status') == 'Ditunda' ? 'selected' : '' }}>
                                Ditunda
                            </option>

                        </select>


                        @error('status')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>


                {{-- Form Footer --}}
                <div class="px-6 py-4
                            bg-slate-50
                            border-t border-slate-200
                            flex flex-col-reverse
                            sm:flex-row sm:justify-end gap-2">

                    <a href="{{ route('hearings.index') }}"
                       class="inline-flex items-center justify-center
                              px-4 py-2.5
                              bg-white hover:bg-slate-100
                              border border-slate-200
                              text-slate-600
                              rounded-lg
                              text-sm font-semibold
                              transition">

                        Batal

                    </a>


                    <button
                        type="submit"
                        class="inline-flex items-center justify-center
                               gap-2
                               px-4 py-2.5
                               bg-blue-600 hover:bg-blue-700
                               text-white
                               rounded-lg
                               text-sm font-semibold
                               transition">

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M5 13l4 4L19 7"/>

                        </svg>

                        Simpan Agenda

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>