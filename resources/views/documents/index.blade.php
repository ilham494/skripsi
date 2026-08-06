<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl">
Data Dokumen
</h2>
</x-slot>


<div class="py-12">

<div class="max-w-7xl mx-auto">


<a href="{{ route('documents.create') }}"
class="bg-blue-600 text-white px-4 py-2 rounded">
+ Tambah Dokumen
</a>


<div class="bg-white shadow rounded-lg mt-5">

<table class="w-full">

<thead>

<tr class="border-b">

<th class="p-3 text-left">
Perkara
</th>

<th class="p-3 text-left">
Nama Dokumen
</th>

<th class="p-3 text-left">
File
</th>

<th class="p-3 text-left">
Aksi
</th>

</tr>

</thead>


<tbody>


@foreach($documents as $document)

<tr class="border-b">


<td class="p-3">

{{ $document->legalCase->judul_perkara }}

</td>


<td class="p-3">

{{ $document->nama_dokumen }}

</td>


<td class="p-3">

<a href="{{ asset('storage/'.$document->file) }}"
target="_blank"
class="text-blue-600">

Download

</a>

</td>


<td class="p-3">


<form method="POST"
action="{{ route('documents.destroy',$document->id) }}">

@csrf

@method('DELETE')


<button class="text-red-600"
onclick="return confirm('Hapus dokumen?')">

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