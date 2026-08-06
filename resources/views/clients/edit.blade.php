<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl">
        Edit Klien
    </h2>
</x-slot>


<div class="py-12">

<div class="max-w-3xl mx-auto">

<form method="POST" action="{{ route('clients.update',$client->id) }}">

@csrf
@method('PUT')


<div class="mb-4">
<label>Nama</label>

<input name="nama"
value="{{ $client->nama }}"
class="border rounded w-full p-2">
</div>


<div class="mb-4">
<label>Email</label>

<input name="email"
value="{{ $client->email }}"
class="border rounded w-full p-2">
</div>


<div class="mb-4">
<label>Telepon</label>

<input name="telepon"
value="{{ $client->telepon }}"
class="border rounded w-full p-2">
</div>


<div class="mb-4">
<label>Alamat</label>

<textarea name="alamat"
class="border rounded w-full p-2">{{ $client->alamat }}</textarea>
</div>


<button class="bg-green-600 text-white px-4 py-2 rounded">
Update
</button>


</form>

</div>

</div>

</x-app-layout>