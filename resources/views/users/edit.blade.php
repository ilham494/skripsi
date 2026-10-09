<x-app-layout>
<x-slot name="header">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">
            Edit User
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Perbarui informasi dan hak akses pengguna.
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
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>

                        </svg>

                    </div>

                    <div>

                        <h3 class="text-lg font-semibold text-slate-800">
                            Informasi User
                        </h3>

                        <p class="text-sm text-slate-400">
                            Ubah data pengguna dan role aksesnya.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Form --}}
            <form method="POST"
                  action="{{ route('users.update', $user->id) }}">

                @csrf
                @method('PUT')


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
                            value="{{ old('name', $user->name) }}"
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
                            value="{{ old('email', $user->email) }}"
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
                                {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                            <option value="lawyer"
                                {{ old('role', $user->role) == 'lawyer' ? 'selected' : '' }}>
                                Lawyer
                            </option>

                            <option value="staff"
                                {{ old('role', $user->role) == 'staff' ? 'selected' : '' }}>
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

                        Update User

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>