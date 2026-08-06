<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl">
Tambah Agenda Sidang
</h2>
</x-slot>

<div class="py-12">
<div class="max-w-3xl mx-auto">

<form method="POST" action="{{ route('hearings.store') }}">

@csrf

<div class="mb-4">
<label>Perkara</label>

<select name="legal_case_id" class="border rounded w-full p-2">

<option value="">-- Pilih Perkara --</option>

@foreach($cases as $case)

<option value="{{ $case->id }}">
{{ $case->nomor_perkara }} - {{ $case->judul_perkara }}
</option>

@endforeach

</select>
</div>

<div class="mb-4">
<label>Tanggal Sidang</label>

<input
type="date"
name="tanggal_sidang"
class="border rounded w-full p-2">
</div>

<div class="mb-4">
<label>Jam</label>

<input
type="time"
name="jam"
class="border rounded w-full p-2">
</div>

<div class="mb-4">
<label>Tempat</label>

<input
name="tempat"
class="border rounded w-full p-2">
</div>

<div class="mb-4">
<label>Agenda</label>

<input
name="agenda"
class="border rounded w-full p-2">
</div>

<div class="mb-4">
<label>Status</label>

<select
name="status"
class="border rounded w-full p-2">

<option>Terjadwal</option>
<option>Selesai</option>
<option>Ditunda</option>

</select>
</div>

<button
class="bg-green-600 text-white px-4 py-2 rounded">

Simpan

</button>

</form>

</div>
</div>

</x-app-layout>