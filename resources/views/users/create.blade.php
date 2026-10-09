<x-app-layout>
<x-slot name="header">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">
            Tambah User
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Tambahkan pengguna baru dan tentukan hak aksesnya.
        </p>
    </div>
</x-slot>


<div class="py-8">

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Back --}}
        <div class="mb-6">

            <a href="{{ route('users.index') }}"
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

                Kembali ke Daftar User

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
                                  d="M12 4v16m8-8H4"/>

                        </svg>

                    </div>

                    <div>

                        <h3 class="text-lg font-semibold text-slate-800">
                            Informasi User
                        </h3>

                        <p class="text-sm text-slate-400">
                            Isi data pengguna yang akan didaftarkan.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Form --}}
            <form method="POST"
                  action="{{ route('users.store') }}">

                @csrf


                <div class="p-6 space-y-5">


                    {{-- Nama --}}
                    <div>

                        <label for="name"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Nama

                        </label>


                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama user"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   placeholder-slate-400
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('name') border-red-400 @enderror">


                        @error('name')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Email --}}
                    <div>

                        <label for="email"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Email

                        </label>


                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="contoh@email.com"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   placeholder-slate-400
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('email') border-red-400 @enderror">


                        @error('email')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Password --}}
                    <div>

                        <label for="password"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Password

                        </label>


                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   placeholder-slate-400
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('password') border-red-400 @enderror">


                        @error('password')

                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror


                        <p class="mt-1.5 text-xs text-slate-400">
                            Gunakan password yang kuat dan tidak mudah ditebak.
                        </p>

                    </div>


                    {{-- Role --}}
                    <div>

                        <label for="role"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-1.5">

                            Role

                        </label>


                        <select
                            id="role"
                            name="role"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition
                                   @error('role') border-red-400 @enderror">

                            <option value="admin"
                                {{ old('role', 'admin') == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                            <option value="lawyer"
                                {{ old('role') == 'lawyer' ? 'selected' : '' }}>
                                Lawyer
                            </option>

                            <option value="staff"
                                {{ old('role') == 'staff' ? 'selected' : '' }}>
                                Staff
                            </option>

                        </select>


                        <p class="mt-1.5 text-xs text-slate-400">
                            Role menentukan hak akses user di dalam sistem.
                        </p>


                        @error('role')

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

                    <a href="{{ route('users.index') }}"
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

                        Simpan User

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>