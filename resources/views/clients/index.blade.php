<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Klien
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4">
                <a href="{{ route('clients.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah Klien
                </a>
            </div>


            <div class="bg-white shadow rounded-lg">

                <table class="w-full">

                    <thead>
                        <tr class="border-b">
                            <th class="p-3 text-left">
                                Nama
                            </th>

                            <th class="p-3 text-left">
                                Email
                            </th>

                            <th class="p-3 text-left">
                                Telepon
                            </th>

                            <th class="p-3 text-left">
                                Aksi
                            </th>
                        </tr>
                    </thead>


                    <tbody>

                    @foreach($clients as $client)

                        <tr class="border-b">

                            <td class="p-3">
                                {{ $client->nama }}
                            </td>

                            <td class="p-3">
                                {{ $client->email }}
                            </td>

                            <td class="p-3">
                                {{ $client->telepon }}
                            </td>

                            <td class="p-3">

                                <a href="{{ route('clients.edit',$client->id) }}"
                                   class="text-blue-600">
                                    Edit
                                </a>


                                <form action="{{ route('clients.destroy',$client->id) }}"
                                      method="POST"
                                      class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="text-red-600 ml-3">
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach


                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>