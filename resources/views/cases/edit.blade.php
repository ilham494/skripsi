<x-app-layout>
<x-slot name="header">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">
            Edit Perkara
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Perbarui informasi perkara yang sudah terdaftar.
        </p>
    </div>
</x-slot>

<div class="py-8">

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Back --}}
        <div class="mb-6">

            <a href="{{ route('cases.show', $case->id) }}"
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

                Kembali ke Detail Perkara

            </a>

        </div>

        {{-- Form Card --}}
        <div class="bg-white border border-slate-200
                    rounded-xl shadow-sm overflow-hidden">

            {{-- Card Header --}}
            <div class="px-6 py-5 border-b border-slate-200
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
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>

                        </svg>

                    </div>

                    <div>

                        <h3 class="text-lg font-semibold text-slate-800">
                            Informasi Perkara
                        </h3>

                        <p class="text-sm text-slate-400">
                            Ubah data perkara sesuai informasi terbaru.
                        </p>

                    </div>

                </div>

            </div>

            {{-- Form --}}
            <form method="POST"
                  action="{{ route('cases.update', $case->id) }}">

                @csrf
                @method('PUT')

                <div class="p-6 space-y-5">

                    {{-- Client --}}
                    <div>

                        <label for="client_id"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Klien

                        </label>

                        <select
                            id="client_id"
                            name="client_id"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('client_id') border-red-400 @enderror">

                            @foreach($clients as $client)

                                <option
                                    value="{{ $client->id }}"
                                    {{ $client->id == $case->client_id ? 'selected' : '' }}>

                                    {{ $client->nama }}

                                </option>

                            @endforeach

                        </select>

                        @error('client_id')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                    {{-- Nomor Perkara --}}
                    <div>

                        <label for="nomor_perkara"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Nomor Perkara

                        </label>

                        <input
                            id="nomor_perkara"
                            type="text"
                            name="nomor_perkara"
                            value="{{ $case->nomor_perkara }}"
                            placeholder="Contoh: 123/Pdt.G/2026/PN.Jkt"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   placeholder-slate-400
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('nomor_perkara') border-red-400 @enderror">

                        @error('nomor_perkara')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                    {{-- Judul Perkara --}}
                    <div>

                        <label for="judul_perkara"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Judul Perkara

                        </label>

                        <input
                            id="judul_perkara"
                            type="text"
                            name="judul_perkara"
                            value="{{ $case->judul_perkara }}"
                            placeholder="Masukkan judul perkara"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   placeholder-slate-400
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('judul_perkara') border-red-400 @enderror">

                        @error('judul_perkara')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                    {{-- Jenis Perkara --}}
                    <div>

                        <label for="jenis_perkara"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Jenis Perkara

                        </label>

                        <input
                            id="jenis_perkara"
                            type="text"
                            name="jenis_perkara"
                            value="{{ $case->jenis_perkara }}"
                            placeholder="Contoh: Perdata, Pidana, atau TUN"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   placeholder-slate-400
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('jenis_perkara') border-red-400 @enderror">

                        @error('jenis_perkara')

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

                            <option value="Baru"
                                {{ $case->status == 'Baru' ? 'selected' : '' }}>
                                Baru
                            </option>

                            <option value="Berjalan"
                                {{ $case->status == 'Berjalan' ? 'selected' : '' }}>
                                Berjalan
                            </option>

                            <option value="Selesai"
                                {{ $case->status == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                        </select>

                        @error('status')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                    {{-- Tanggal Mulai --}}
                    <div>

                        <label for="tanggal_mulai"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Tanggal Mulai

                        </label>

                        <input
                            id="tanggal_mulai"
                            type="date"
                            name="tanggal_mulai"
                            value="{{ $case->tanggal_mulai }}"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('tanggal_mulai') border-red-400 @enderror">

                        @error('tanggal_mulai')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                    {{-- Deskripsi --}}
                    <div>

                        <label for="deskripsi"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Deskripsi

                        </label>

                        <textarea
                            id="deskripsi"
                            name="deskripsi"
                            rows="5"
                            placeholder="Masukkan deskripsi perkara..."
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   placeholder-slate-400
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   resize-y
                                   @error('deskripsi') border-red-400 @enderror">{{ $case->deskripsi }}</textarea>

                        @error('deskripsi')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>

                {{-- Form Footer --}}
                <div class="px-6 py-4 bg-slate-50
                            border-t border-slate-200
                            flex flex-col-reverse sm:flex-row
                            sm:justify-end gap-2">

                    <a href="{{ route('cases.show', $case->id) }}"
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
                               gap-2 px-4 py-2.5
                               bg-blue-600 hover:bg-blue-700
                               text-white rounded-lg
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

                        Update Perkara

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>