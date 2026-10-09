<x-guest-layout>
<div class="min-h-screen flex flex-col items-center">

    {{-- Logo / Brand --}}
    <div class="pt-8 pb-8">
        <a href="/" class="flex items-center gap-3">

            {{-- Ganti dengan logo kamu --}}
            <img
                src="{{ asset('images/logo.png') }}"
                alt="{{ config('app.name') }}"
                class="w-12 h-12 object-contain"
            >

            <span class="text-3xl font-bold text-slate-950">
                {{ config('app.name', 'ODS Law Firm') }}
            </span>

        </a>
    </div>


    {{-- Login Card --}}
    <div class="w-full max-w-[674px] bg-white border border-slate-200 rounded-xl shadow-sm">

        <div class="px-12 py-12">

            {{-- Title --}}
            <div class="mb-10">

                <h1 class="text-4xl font-bold tracking-tight text-slate-950">
                    Sign in to your account
                </h1>

            </div>


            {{-- Session Status --}}
            <x-auth-session-status
                class="mb-5"
                :status="session('status')"
            />


            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf


                {{-- Email --}}
                <div class="mb-8">

                    <label
                        for="email"
                        class="block mb-3 text-lg font-medium text-slate-950"
                    >
                        Your email
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
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
                <div class="mb-8">

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
                            autocomplete="current-password"
                            placeholder="••••••••"

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

                        {{-- Show password --}}
                        <button
                            type="button"
                            onclick="togglePassword()"
                            class="absolute right-4 top-1/2
                                   -translate-y-1/2
                                   text-slate-400
                                   hover:text-slate-600"
                        >

                            <svg
                                id="eye-open"
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
                                id="eye-closed"
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


                {{-- Math CAPTCHA --}}
                <div class="mb-8">

                    <label
                        for="captcha"
                        class="block mb-3 text-lg font-medium text-slate-950"
                    >
                        Security check
                    </label>

                    <div class="flex items-center gap-4">

                        <div
                            class="h-[68px] px-6
                                   flex items-center
                                   rounded-xl
                                   border border-slate-300
                                   bg-slate-100
                                   text-xl font-semibold
                                   text-slate-900
                                   whitespace-nowrap"
                        >
                            {{ session('captcha_question') }} =
                        </div>

                        <input
                            id="captcha"
                            type="number"
                            name="captcha"
                            value="{{ old('captcha') }}"
                            required
                            inputmode="numeric"
                            autocomplete="off"
                            placeholder="Answer"

                            class="flex-1 h-[68px] px-4
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

                    </div>

                    <x-input-error
                        :messages="$errors->get('captcha')"
                        class="mt-2"
                    />

                </div>


                {{-- Remember + Forgot Password --}}
                <div class="flex items-center justify-between mb-8">

                    <label class="flex items-center cursor-pointer">

                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"

                            class="w-6 h-6
                                   rounded-md
                                   border-slate-300
                                   text-blue-600
                                   focus:ring-blue-500"
                        >

                        <span class="ml-4 text-lg text-slate-600">
                            Remember me
                        </span>

                    </label>


                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="text-lg font-medium text-blue-600 hover:text-blue-700"
                        >
                            Forgot password?
                        </a>

                    @endif

                </div>


                {{-- Login Button --}}
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
                    Sign in
                </button>

            </form>


            {{-- Register --}}
            @if (Route::has('register'))

                <div class="hidden mt-9 text-lg text-slate-500">

                    Don't have an account yet?

                    <a
                        href="{{ route('register') }}"
                        class="font-medium text-blue-600 hover:text-blue-700"
                    >
                        Sign up
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>


{{-- Password Toggle --}}
<script>
    function togglePassword() {

        const password = document.getElementById('password');

        const eyeOpen = document.getElementById('eye-open');

        const eyeClosed = document.getElementById('eye-closed');


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