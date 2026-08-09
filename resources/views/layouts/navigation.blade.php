<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">

                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Logo Sistem Informasi Hukum"
                    class="h-10 w-auto"
                        >
                    </a>

                </div>


                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                <a href="#"
class="text-gray-700 hover:text-blue-600">

🔔

@if(auth()->user()
    ->notifications()
    ->where('dibaca',false)
    ->count())

<span class="bg-red-600 text-white rounded-full px-2 text-xs">

{{ auth()->user()
    ->notifications()
    ->where('dibaca',false)
    ->count() }}

</span>

@endif

</a>
                    <!-- Dashboard -->
                    <x-nav-link 
                        :href="route('dashboard')" 
                        :active="request()->routeIs('dashboard')">

                        Dashboard

                    </x-nav-link>



                    {{-- ADMIN MENU --}}
                    @if(auth()->user()->role == 'admin')

                    <x-nav-link :href="route('users.index')">

                    User Management

                    </x-nav-link>

                    <x-nav-link 
                        :href="route('clients.index')">

                        Klien

                    </x-nav-link>



                    <x-nav-link 
                        :href="route('cases.index')">

                        Perkara

                    </x-nav-link>



                    <x-nav-link 
                        :href="route('lawyers.index')">

                        Lawyer

                    </x-nav-link>



                    <x-nav-link 
                        :href="route('documents.index')">

                        Dokumen

                    </x-nav-link>



                    <x-nav-link 
                        :href="route('hearings.index')">

                        Agenda Sidang

                    </x-nav-link>


                    @endif




                    {{-- LAWYER MENU --}}
                    @if(auth()->user()->role == 'lawyer')


                    <x-nav-link 
                        :href="route('cases.index')">

                        Perkara

                    </x-nav-link>



                    <x-nav-link 
                        :href="route('documents.index')">

                        Dokumen

                    </x-nav-link>



                    <x-nav-link 
                        :href="route('hearings.index')">

                        Agenda Sidang

                    </x-nav-link>


                    @endif




                    {{-- STAFF MENU --}}
                    @if(auth()->user()->role == 'staff')


                    <x-nav-link 
                        :href="route('clients.index')">

                        Klien

                    </x-nav-link>



                    <x-nav-link 
                        :href="route('documents.index')">

                        Dokumen

                    </x-nav-link>



                    <x-nav-link 
                        :href="route('hearings.index')">

                        Agenda Sidang

                    </x-nav-link>


                    @endif


                </div>

            </div>



            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">


                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button 
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700">

                            <div>
                                {{ Auth::user()->name }}
                            </div>


                            <div class="ms-1">

                                <svg class="fill-current h-4 w-4" 
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">

                                    <path fill-rule="evenodd" 
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" 
                                    clip-rule="evenodd" />

                                </svg>

                            </div>

                        </button>

                    </x-slot>



                    <x-slot name="content">


                        <x-dropdown-link :href="route('profile.edit')">

                            Profile

                        </x-dropdown-link>



                        <!-- Logout -->

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link 
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">

                                Logout

                            </x-dropdown-link>


                        </form>


                    </x-slot>


                </x-dropdown>


            </div>



            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">

                <button 
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400">

                    <svg class="h-6 w-6" 
                    stroke="currentColor" 
                    fill="none" 
                    viewBox="0 0 24 24">

                        <path 
                        :class="{'hidden': open, 'inline-flex': ! open }"
                        class="inline-flex"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"/>


                        <path 
                        :class="{'hidden': ! open, 'inline-flex': open }"
                        class="hidden"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"/>

                    </svg>

                </button>

            </div>


        </div>

    </div>



</nav>