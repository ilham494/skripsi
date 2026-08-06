<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl">
        Tambah Lawyer
    </h2>
</x-slot>


<div class="py-12">

<div class="max-w-3xl mx-auto">


<form method="POST" action="{{ route('lawyers.store') }}">

@csrf


<div class="mb-4">
<label>Nama Lawyer</label>

<input type="text"
name="nama"
class="border rounded w-full p-2">
</div>


<div class="mb-4">
<label>Email</label>

<input type="email"
name="email"
class="border rounded w-full p-2">
</div>


<div class="mb-4">
<label>Telepon</label>

<input type="text"
name="telepon"
class="border rounded w-full p-2">
</div>


<div class="mb-4">
<label>Nomor Izin Advokat</label>

<input type="text"
name="nomor_izin_advokat"
class="border rounded w-full p-2">
</div>


<div class="mb-4">
<label>Spesialisasi</label>

<input type="text"
name="spesialisasi"
class="border rounded w-full p-2">
</div>


<div class="mb-4">
<label>Alamat</label>

<textarea name="alamat"
class="border rounded w-full p-2"></textarea>
</div>


<button class="bg-green-600 text-white px-4 py-2 rounded">
Simpan
</button>


</form>


</div>

</div>


</x-app-layout>