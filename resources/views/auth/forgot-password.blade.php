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


        {{-- Forgot Password Card --}}
        <div class="w-full max-w-[674px] bg-white border border-slate-200 rounded-xl shadow-sm">

            <div class="px-12 py-12">

                {{-- Title --}}
                <div class="mb-8">

                    <h1 class="text-4xl font-bold tracking-tight text-slate-950">
                        Forgot your password?
                    </h1>

                    <p class="mt-4 text-lg leading-7 text-slate-500">
                        No problem. Just enter your email address and
                        we'll send you a password reset link.
                    </p>

                </div>


                {{-- Session Status --}}
                <x-auth-session-status
                    class="mb-5"
                    :status="session('status')"
                />


                {{-- Form --}}
                <form method="POST" action="{{ route('password.email') }}">
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
                            autocomplete="email"
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


                    {{-- Send Button --}}
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
                        Email Password Reset Link
                    </button>

                </form>


                {{-- Back to Login --}}
                <div class="mt-8 text-center">

                    <a
                        href="{{ route('login') }}"
                        class="text-lg font-medium text-blue-600 hover:text-blue-700"
                    >
                        ← Back to sign in
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
