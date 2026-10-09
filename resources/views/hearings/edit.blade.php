<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800">
            Edit Agenda Sidang
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6">

                <form method="POST"
                      action="{{ route('hearings.update', $hearing->id) }}">

                    @csrf
                    @method('PUT')


                    {{-- Perkara --}}
                    <div class="mb-5">

                        <label
                            for="legal_case_id"
                            class="block text-sm font-medium text-slate-700 mb-2">

                            Perkara

                        </label>

                        <select
                            name="legal_case_id"
                            id="legal_case_id"
                            required
                            class="border-slate-300 rounded-lg w-full p-2.5
                                   focus:border-blue-500 focus:ring-blue-500">

                            <option value="">
                                -- Pilih Perkara --
                            </option>

                            @foreach($cases as $case)

                                <option
                                    value="{{ $case->id }}"
                                    {{ old('legal_case_id', $hearing->legal_case_id) == $case->id ? 'selected' : '' }}>

                                    {{ $case->nomor_perkara }} - {{ $case->judul_perkara }}

                                </option>

                            @endforeach

                        </select>

                        @error('legal_case_id')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Tanggal --}}
                    <div class="mb-5">

                        <label
                            for="tanggal_sidang"
                            class="block text-sm font-medium text-slate-700 mb-2">

                            Tanggal Sidang

                        </label>

                        <input
                            type="date"
                            name="tanggal_sidang"
                            id="tanggal_sidang"
                            value="{{ old('tanggal_sidang', $hearing->tanggal_sidang) }}"
                            required
                            class="border-slate-300 rounded-lg w-full p-2.5
                                   focus:border-blue-500 focus:ring-blue-500">

                        @error('tanggal_sidang')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Jam --}}
                    <div class="mb-5">

                        <label
                            for="jam"
                            class="block text-sm font-medium text-slate-700 mb-2">

                            Jam

                        </label>

                        <input
                            type="time"
                            name="jam"
                            id="jam"
                            value="{{ old('jam', $hearing->jam) }}"
                            required
                            class="border-slate-300 rounded-lg w-full p-2.5
                                   focus:border-blue-500 focus:ring-blue-500">

                        @error('jam')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Tempat --}}
                    <div class="mb-5">

                        <label
                            for="tempat"
                            class="block text-sm font-medium text-slate-700 mb-2">

                            Tempat

                        </label>

                        <input
                            type="text"
                            name="tempat"
                            id="tempat"
                            value="{{ old('tempat', $hearing->tempat) }}"
                            required
                            class="border-slate-300 rounded-lg w-full p-2.5
                                   focus:border-blue-500 focus:ring-blue-500">

                        @error('tempat')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Agenda --}}
                    <div class="mb-5">

                        <label
                            for="agenda"
                            class="block text-sm font-medium text-slate-700 mb-2">

                            Agenda

                        </label>

                        <input
                            type="text"
                            name="agenda"
                            id="agenda"
                            value="{{ old('agenda', $hearing->agenda) }}"
                            required
                            class="border-slate-300 rounded-lg w-full p-2.5
                                   focus:border-blue-500 focus:ring-blue-500">

                        @error('agenda')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Status --}}
                    <div class="mb-5">

                        <label
                            for="status"
                            class="block text-sm font-medium text-slate-700 mb-2">

                            Status

                        </label>

                        <select
                            name="status"
                            id="status"
                            required
                            class="border-slate-300 rounded-lg w-full p-2.5
                                   focus:border-blue-500 focus:ring-blue-500">

                            <option value="Terjadwal"
                                {{ old('status', $hearing->status) == 'Terjadwal' ? 'selected' : '' }}>
                                Terjadwal
                            </option>

                            <option value="Selesai"
                                {{ old('status', $hearing->status) == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                            <option value="Ditunda"
                                {{ old('status', $hearing->status) == 'Ditunda' ? 'selected' : '' }}>
                                Ditunda
                            </option>

                        </select>

                        @error('status')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Hasil Persidangan --}}
                    <div class="mb-6">

                        <label
                            for="hasil_persidangan"
                            class="block text-sm font-medium text-slate-700 mb-2">

                            Hasil Persidangan
                            <span class="text-slate-400 font-normal">
                                (Opsional)
                            </span>

                        </label>

                        <textarea
                            name="hasil_persidangan"
                            id="hasil_persidangan"
                            rows="5"
                            placeholder="Isi hasil atau perkembangan yang terjadi selama persidangan..."
                            class="border-slate-300 rounded-lg w-full p-2.5
                                   focus:border-blue-500 focus:ring-blue-500
                                   resize-y">{{ old('hasil_persidangan', $hearing->hasil_persidangan) }}</textarea>

                        <p class="text-xs text-slate-500 mt-1.5">
                            Isi setelah persidangan berlangsung. Untuk agenda yang
                            masih terjadwal, bagian ini dapat dikosongkan.
                        </p>

                        @error('hasil_persidangan')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Buttons --}}
                    <div class="flex items-center justify-end gap-3">

                        <a
                            href="{{ route('hearings.index') }}"
                            class="px-4 py-2.5 rounded-lg border border-slate-300
                                   text-sm font-medium text-slate-600
                                   hover:bg-slate-50 transition">

                            Batal

                        </a>

                        <button
                            type="submit"
                            class="px-5 py-2.5 rounded-lg bg-blue-600
                                   text-white text-sm font-semibold
                                   hover:bg-blue-700 transition">

                            Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
