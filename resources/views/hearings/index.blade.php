<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl">
Agenda Sidang
</h2>
</x-slot>

<div class="py-12">

<div class="max-w-7xl mx-auto">

<a href="{{ route('hearings.create') }}"
class="bg-blue-600 text-white px-4 py-2 rounded">

+ Tambah Agenda

</a>

<div class="bg-white shadow rounded-lg mt-5">

<table class="w-full">

<thead>

<tr class="border-b">

<th class="p-3 text-left">Perkara</th>
<th class="p-3 text-left">Tanggal</th>
<th class="p-3 text-left">Jam</th>
<th class="p-3 text-left">Tempat</th>
<th class="p-3 text-left">Agenda</th>
<th class="p-3 text-left">Status</th>

</tr>

</thead>

<tbody>

@foreach($hearings as $hearing)

<tr class="border-b">

<td class="p-3">
{{ $hearing->legalCase->judul_perkara }}
</td>

<td class="p-3">
{{ $hearing->tanggal_sidang }}
</td>

<td class="p-3">
{{ $hearing->jam }}
</td>

<td class="p-3">
{{ $hearing->tempat }}
</td>

<td class="p-3">
{{ $hearing->agenda }}
</td>

<td class="p-3">
{{ $hearing->status }}
</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

</x-app-layout>