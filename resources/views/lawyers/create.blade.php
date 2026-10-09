<x-app-layout>
<x-slot name="header">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">
            Tambah Lawyer
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Tambahkan data lawyer baru ke dalam sistem.
        </p>
    </div>
</x-slot>


<div class="py-8">

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Validation Error --}}
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
                              d="M12 8v4m0 4h.01M10.29 3.86l-8.18 14A2 2 0 003.84 21h16.32a2 2 0 001.73-3.14l-8.18-14a2 2 0 00-3.42 0z"/>
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


        {{-- Form --}}
        <form method="POST"
              action="{{ route('lawyers.store') }}"
              class="bg-white rounded-xl border border-slate-200
                     shadow-sm p-6">

            @csrf


            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- Nama --}}
                <div class="md:col-span-2">

                    <label for="nama"
                           class="block mb-2 text-sm font-medium text-slate-700">
                        Nama Lawyer
                    </label>

                    <input type="text"
                           name="nama"
                           id="nama"
                           value="{{ old('nama') }}"
                           class="border border-slate-300 rounded-lg
                                  w-full p-2.5
                                  focus:border-blue-500
                                  focus:ring-blue-500">

                    @error('nama')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Email --}}
                <div>

                    <label for="email"
                           class="block mb-2 text-sm font-medium text-slate-700">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           id="email"
                           value="{{ old('email') }}"
                           class="border border-slate-300 rounded-lg
                                  w-full p-2.5
                                  focus:border-blue-500
                                  focus:ring-blue-500">

                    @error('email')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Telepon --}}
                <div>

                    <label for="telepon"
                           class="block mb-2 text-sm font-medium text-slate-700">
                        Telepon
                    </label>

                    <input type="text"
                           name="telepon"
                           id="telepon"
                           value="{{ old('telepon') }}"
                           class="border border-slate-300 rounded-lg
                                  w-full p-2.5
                                  focus:border-blue-500
                                  focus:ring-blue-500">

                </div>


                {{-- Nomor Izin --}}
                <div>

                    <label for="nomor_izin_advokat"
                           class="block mb-2 text-sm font-medium text-slate-700">
                        Nomor Izin Advokat
                    </label>

                    <input type="text"
                           name="nomor_izin_advokat"
                           id="nomor_izin_advokat"
                           value="{{ old('nomor_izin_advokat') }}"
                           class="border border-slate-300 rounded-lg
                                  w-full p-2.5
                                  focus:border-blue-500
                                  focus:ring-blue-500">

                </div>


                {{-- Spesialisasi --}}
                <div>

                    <label for="spesialisasi"
                           class="block mb-2 text-sm font-medium text-slate-700">
                        Spesialisasi
                    </label>

                    <input type="text"
                           name="spesialisasi"
                           id="spesialisasi"
                           value="{{ old('spesialisasi') }}"
                           class="border border-slate-300 rounded-lg
                                  w-full p-2.5
                                  focus:border-blue-500
                                  focus:ring-blue-500">

                </div>


                {{-- Alamat --}}
                <div class="md:col-span-2">

                    <label for="alamat"
                           class="block mb-2 text-sm font-medium text-slate-700">
                        Alamat
                    </label>

                    <textarea name="alamat"
                              id="alamat"
                              rows="4"
                              class="border border-slate-300 rounded-lg
                                     w-full p-2.5
                                     focus:border-blue-500
                                     focus:ring-blue-500">{{ old('alamat') }}</textarea>

                </div>

            </div>


            {{-- Buttons --}}
            <div class="flex items-center justify-end gap-3 mt-6 pt-5
                        border-t border-slate-100">

                <a href="{{ route('lawyers.index') }}"
                   class="px-4 py-2.5 rounded-lg
                          border border-slate-300
                          text-slate-600
                          hover:bg-slate-50
                          text-sm font-medium transition">

                    Batal

                </a>

                <button type="submit"
                        class="bg-green-600 hover:bg-green-700
                               text-white px-5 py-2.5 rounded-lg
                               text-sm font-semibold transition">

                    Simpan Lawyer

                </button>

            </div>

        </form>

    </div>

</div>

</x-app-layout>