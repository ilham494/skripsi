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
                {{ config('app.name', 'ODS Law Firm') }}
            </span>

        </a>
    </div>


    {{-- OTP Card --}}
    <div class="w-full max-w-[674px] bg-white border border-slate-200 rounded-xl shadow-sm">

        <div class="px-12 py-12">

            {{-- Title --}}
            <div class="mb-8">

                <h1 class="text-4xl font-bold tracking-tight text-slate-950">
                    Verify your identity
                </h1>

                <p class="mt-3 text-lg text-slate-500 leading-relaxed">
                    Enter the 6-digit verification code sent to your email.
                </p>

            </div>


            {{-- Error / Session Status --}}
            <x-auth-session-status
                class="mb-5"
                :status="session('status')"
            />


            {{-- OTP Form --}}
            <form method="POST" action="{{ route('otp.verify') }}">
                @csrf


                {{-- OTP --}}
                <div class="mb-8">

                    <label
                        for="otp"
                        class="block mb-3 text-lg font-medium text-slate-950"
                    >
                        Verification code
                    </label>


                    <input
                        id="otp"
                        type="text"
                        name="otp"
                        maxlength="6"
                        inputmode="numeric"
                        autocomplete="one-time-code"
                        autofocus
                        required
                        placeholder="000000"

                        class="w-full h-[68px] px-4
                               rounded-xl
                               border border-slate-300
                               bg-slate-50
                               text-2xl
                               text-center
                               tracking-[0.5em]
                               font-semibold
                               text-slate-900
                               placeholder:text-slate-400
                               outline-none
                               transition

                               focus:bg-white
                               focus:border-blue-600
                               focus:ring-2
                               focus:ring-blue-600/20"
                    >


                    <x-input-error
                        :messages="$errors->get('otp')"
                        class="mt-2"
                    />

                </div>


                {{-- OTP Information --}}
                <div class="mb-8 rounded-xl border border-slate-200 bg-slate-50 px-5 py-4">

                    <div class="flex items-center gap-3">

                        {{-- Info Icon --}}
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 text-slate-500 flex-shrink-0"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z"
                            />
                        </svg>

                        <p class="text-sm text-slate-600">
                            The verification code is valid for
                            <span class="font-semibold text-slate-900">
                                5 minutes
                            </span>.
                        </p>

                    </div>

                </div>


                {{-- Verify Button --}}
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
                    Verify code
                </button>

            </form>


            {{-- Back to Login --}}
            <div class="mt-8 text-center">

                <a
                    href="{{ route('login') }}"
                    class="text-lg font-medium text-blue-600 hover:text-blue-700"
                >
                    Back to sign in
                </a>

            </div>

        </div>

    </div>

</div>


{{-- OTP Input --}}
<script>
    const otpInput = document.getElementById('otp');

    otpInput.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 6);
    });
</script>

</x-guest-layout>