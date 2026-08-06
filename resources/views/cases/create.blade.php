<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl">
Tambah Perkara
</h2>
</x-slot>


<div class="py-12">

<div class="max-w-3xl mx-auto">


<form method="POST" action="{{ route('cases.store') }}">

@csrf


<div class="mb-4">

<label>Klien</label>

<select name="client_id"
class="border rounded w-full p-2">

<option value="">
-- Pilih Klien --
</option>

@foreach($clients as $client)

<option value="{{ $client->id }}">
{{ $client->nama }}
</option>

@endforeach

</select>

</div>


<div class="mb-4">

<label>Lawyer</label>

<select name="lawyer_id"
class="border rounded w-full p-2">

<option value="">
-- Pilih Lawyer --
</option>

@foreach($lawyers as $lawyer)

<option value="{{ $lawyer->id }}">
{{ $lawyer->nama }}
</option>

@endforeach

</select>

</div>


<div class="mb-4">

<label>Nomor Perkara</label>

<input name="nomor_perkara"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Judul Perkara</label>

<input name="judul_perkara"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Jenis Perkara</label>

<input name="jenis_perkara"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Status</label>

<select name="status"
class="border rounded w-full p-2">

<option>Baru</option>
<option>Berjalan</option>
<option>Selesai</option>

</select>

</div>


<div class="mb-4">

<label>Tanggal Mulai</label>

<input type="date"
name="tanggal_mulai"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Deskripsi</label>

<textarea name="deskripsi"
class="border rounded w-full p-2"></textarea>

</div>


<button class="bg-green-600 text-white px-4 py-2 rounded">
Simpan
</button>


</form>


</div>

</div>

</x-app-layout>