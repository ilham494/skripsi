<x-guest-layout>

    <div class="min-h-screen flex flex-col items-center">

        {{-- Logo / Brand --}}
        <div class="pt-8 pb-8">
            <a href="/" class="flex items-center gap-3">

                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="{{ config('app.name') }}"
                    class="w-12 h-12 object-contain"
                >

                <span class="text-3xl font-bold text-slate-950">
                    {{ config('app.name', 'Laravel') }}
                </span>

            </a>
        </div>


        {{-- Register Card --}}
        <div class="w-full max-w-[674px] bg-white border border-slate-200 rounded-xl shadow-sm">

            <div class="px-12 py-12">

                {{-- Title --}}
                <div class="mb-10">

                    <h1 class="text-4xl font-bold tracking-tight text-slate-950">
                        Create your account
                    </h1>

                    <p class="mt-3 text-lg text-slate-500">
                        Get started by creating your account.
                    </p>

                </div>


                {{-- Register Form --}}
                <form method="POST" action="{{ route('register') }}">
                    @csrf


                    {{-- Name --}}
                    <div class="mb-6">

                        <label
                            for="name"
                            class="block mb-3 text-lg font-medium text-slate-950"
                        >
                            Full name
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="John Doe"

                            class="w-full h-[68px] px-4
                                   rounded-xl
                                   border border-slate-300
                                   bg-slate-50
                                   text-lg text-slate-900
                                   placeholder:text-slate-400
                                   outline-none
                                   transition

                                   focus:bg-white
                                   focus:border-blue-600
                                   focus:ring-2
                                   focus:ring-blue-600/20"
                        >

                        <x-input-error
                            :messages="$errors->get('name')"
                            class="mt-2"
                        />

                    </div>


                    {{-- Email --}}
                    <div class="mb-6">

                        <label
                            for="email"
                            class="block mb-3 text-lg font-medium text-slate-950"
                        >
                            Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="name@company.com"

                            class="w-full h-[68px] px-4
                                   rounded-xl
                                   border border-slate-300
                                   bg-slate-50
                                   text-lg text-slate-900
                                   placeholder:text-slate-400
                                   outline-none
                                   transition

                                   focus:bg-white
                                   focus:border-blue-600
                                   focus:ring-2
                                   focus:ring-blue-600/20"
                        >

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"
                        />

                    </div>


                    {{-- Password --}}
                    <div class="mb-6">

                        <label
                            for="password"
                            class="block mb-3 text-lg font-medium text-slate-950"
                        >
                            Password
                        </label>

                        <div class="relative">

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Create a password"

                                class="w-full h-[68px] px-4 pr-14
                                       rounded-xl
                                       border border-slate-300
                                       bg-slate-50
                                       text-lg text-slate-900
                                       placeholder:text-slate-400
                                       outline-none
                                       transition

                                       focus:bg-white
                                       focus:border-blue-600
                                       focus:ring-2
                                       focus:ring-blue-600/20"
                            >

                            <button
                                type="button"
                                onclick="togglePassword('password', 'eye-open-1', 'eye-closed-1')"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600"
                            >

                                <svg
                                    id="eye-open-1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                    />
                                </svg>

                                <svg
                                    id="eye-closed-1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="hidden w-6 h-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 012.235-3.592"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6.228 6.228A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.132 5.411"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6.228 6.228L3 3"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6.228 6.228l11.544 11.544"
                                    />
                                </svg>

                            </button>

                        </div>

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"
                        />

                    </div>


                    {{-- Confirm Password --}}
                    <div class="mb-8">

                        <label
                            for="password_confirmation"
                            class="block mb-3 text-lg font-medium text-slate-950"
                        >
                            Confirm password
                        </label>

                        <div class="relative">

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm your password"

                                class="w-full h-[68px] px-4 pr-14
                                       rounded-xl
                                       border border-slate-300
                                       bg-slate-50
                                       text-lg text-slate-900
                                       placeholder:text-slate-400
                                       outline-none
                                       transition

                                       focus:bg-white
                                       focus:border-blue-600
                                       focus:ring-2
                                       focus:ring-blue-600/20"
                            >

                            <button
                                type="button"
                                onclick="togglePassword('password_confirmation', 'eye-open-2', 'eye-closed-2')"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600"
                            >

                                <svg
                                    id="eye-open-2"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7 1.274 4.057 5.064 7 9.542 7z"
                                    />
                                </svg>

                                <svg
                                    id="eye-closed-2"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="hidden w-6 h-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 012.235-3.592"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6.228 6.228A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.132 5.411"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6.228 6.228L3 3"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6.228 6.228l11.544 11.544"
                                    />
                                </svg>

                            </button>

                        </div>

                        <x-input-error
                            :messages="$errors->get('password_confirmation')"
                            class="mt-2"
                        />

                    </div>


                    {{-- Register Button --}}
                    <button
                        type="submit"

                        class="w-full h-[60px]
                               rounded-xl
                               bg-blue-600
                               text-white
                               text-lg
                               font-semibold

                               transition
                               duration-200

                               hover:bg-blue-700
                               focus:outline-none
                               focus:ring-4
                               focus:ring-blue-600/20

                               active:scale-[0.99]"
                    >
                        Create account
                    </button>

                </form>


                {{-- Login Link --}}
                <div class="mt-8 text-center text-lg text-slate-500">

                    Already have an account?

                    <a
                        href="{{ route('login') }}"
                        class="font-medium text-blue-600 hover:text-blue-700"
                    >
                        Sign in
                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- Password Toggle --}}
    <script>
        function togglePassword(inputId, openId, closedId) {

            const password = document.getElementById(inputId);
            const eyeOpen = document.getElementById(openId);
            const eyeClosed = document.getElementById(closedId);

            if (password.type === 'password') {

                password.type = 'text';

                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');

            } else {

                password.type = 'password';

                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');

            }
        }
    </script>

</x-guest-layout>
