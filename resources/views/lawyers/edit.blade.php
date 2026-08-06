<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl">
Edit Lawyer
</h2>
</x-slot>


<div class="py-12">

<div class="max-w-3xl mx-auto">


<form method="POST"
action="{{ route('lawyers.update',$lawyer->id) }}">

@csrf
@method('PUT')


<div class="mb-4">

<label>Nama Lawyer</label>

<input name="nama"
value="{{ $lawyer->nama }}"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Email</label>

<input name="email"
value="{{ $lawyer->email }}"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Telepon</label>

<input name="telepon"
value="{{ $lawyer->telepon }}"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Nomor Izin Advokat</label>

<input name="nomor_izin_advokat"
value="{{ $lawyer->nomor_izin_advokat }}"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Spesialisasi</label>

<input name="spesialisasi"
value="{{ $lawyer->spesialisasi }}"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Alamat</label>

<textarea name="alamat"
class="border rounded w-full p-2">{{ $lawyer->alamat }}</textarea>

</div>


<button class="bg-green-600 text-white px-4 py-2 rounded">
Update
</button>


</form>


</div>

</div>

</x-app-layout>