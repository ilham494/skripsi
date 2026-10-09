<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800">
            Tambah Dokumen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4">

            {{-- Pesan error validasi --}}
            @if ($errors->any())
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 8v4m0 4h.01M10.29 3.86l-8.18 14A2 2 0 003.84 21h16.32a2 2 0 001.73-3.14l-8.18-14a2 2 0 00-3.42 0z" />
                        </svg>

                        <p class="font-semibold text-red-800">
                            Data belum dapat disimpan
                        </p>
                    </div>

                    <ul class="mt-2 ml-7 list-disc text-sm text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST"
                  action="{{ route('documents.store') }}"
                  enctype="multipart/form-data"
                  class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">

                @csrf


                {{-- Perkara --}}
                <div class="mb-5">

                    <label for="legal_case_id"
                           class="block mb-2 text-sm font-medium text-slate-700">
                        Perkara
                    </label>

                    <select name="legal_case_id"
                            id="legal_case_id"
                            class="border border-slate-300 rounded-lg w-full p-2.5
                                   focus:border-blue-500 focus:ring-blue-500">

                        <option value="">
                            -- Pilih Perkara --
                        </option>

                        @foreach($cases as $case)

                            <option value="{{ $case->id }}"
                                {{ old('legal_case_id') == $case->id ? 'selected' : '' }}>

                                {{ $case->nomor_perkara }} - {{ $case->judul_perkara }}

                            </option>

                        @endforeach

                    </select>

                    @error('legal_case_id')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Nama Dokumen --}}
                <div class="mb-5">

                    <label for="nama_dokumen"
                           class="block mb-2 text-sm font-medium text-slate-700">
                        Nama Dokumen
                    </label>

                    <input type="text"
                           name="nama_dokumen"
                           id="nama_dokumen"
                           value="{{ old('nama_dokumen') }}"
                           class="border border-slate-300 rounded-lg w-full p-2.5
                                  focus:border-blue-500 focus:ring-blue-500">

                    @error('nama_dokumen')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Upload File --}}
                <div class="mb-5">

                    <label for="file"
                           class="block mb-2 text-sm font-medium text-slate-700">
                        Upload File
                    </label>

                    <input type="file"
                           name="file"
                           id="file"
                           class="border border-slate-300 rounded-lg w-full p-2.5
                                  focus:border-blue-500 focus:ring-blue-500">

                    <p class="mt-1 text-xs text-slate-500">
                        File wajib diupload. Maksimal ukuran 5 MB.
                    </p>

                    @error('file')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Keterangan --}}
                <div class="mb-6">

                    <label for="keterangan"
                           class="block mb-2 text-sm font-medium text-slate-700">
                        Keterangan
                    </label>

                    <textarea name="keterangan"
                              id="keterangan"
                              rows="4"
                              class="border border-slate-300 rounded-lg w-full p-2.5
                                     focus:border-blue-500 focus:ring-blue-500">{{ old('keterangan') }}</textarea>

                    @error('keterangan')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Tombol --}}
                <div class="flex justify-end">

                    <button type="submit"
                            class="bg-green-600 hover:bg-green-700
                                   text-white px-5 py-2.5 rounded-lg
                                   font-medium transition">

                        Simpan

                    </button>

                </div>

            </form>

        </div>
    </div>

</x-app-layout>
