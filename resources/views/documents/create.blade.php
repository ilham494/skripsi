<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl">
Tambah Dokumen
</h2>
</x-slot>


<div class="py-12">

<div class="max-w-3xl mx-auto">


<form method="POST"
action="{{ route('documents.store') }}"
enctype="multipart/form-data">

@csrf


<div class="mb-4">

<label>Perkara</label>

<select name="legal_case_id"
class="border rounded w-full p-2">

<option value="">
-- Pilih Perkara --
</option>

@foreach($cases as $case)

<option value="{{ $case->id }}">
{{ $case->nomor_perkara }} - {{ $case->judul_perkara }}
</option>

@endforeach

</select>

</div>


<div class="mb-4">

<label>Nama Dokumen</label>

<input name="nama_dokumen"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Upload File</label>

<input type="file"
name="file"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Keterangan</label>

<textarea name="keterangan"
class="border rounded w-full p-2"></textarea>

</div>


<button class="bg-green-600 text-white px-4 py-2 rounded">
Simpan
</button>


</form>


</div>

</div>

</x-app-layout>