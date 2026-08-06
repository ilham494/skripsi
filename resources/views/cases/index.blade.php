<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl">
        Data Perkara
    </h2>
</x-slot>

<div class="py-12">

<div class="max-w-7xl mx-auto">

@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif


<div class="bg-white shadow rounded-lg p-4 mb-5">

<form method="GET" action="{{ route('cases.index') }}">

<div class="grid grid-cols-1 md:grid-cols-4 gap-4">

<div>
<input
type="text"
name="search"
value="{{ request('search') }}"
placeholder="Cari nomor / judul perkara..."
class="border rounded w-full p-2">
</div>


<div>

<select
name="status"
class="border rounded w-full p-2">

<option value="">Semua Status</option>

<option value="Baru"
{{ request('status')=='Baru'?'selected':'' }}>
Baru
</option>

<option value="Berjalan"
{{ request('status')=='Berjalan'?'selected':'' }}>
Berjalan
</option>

<option value="Selesai"
{{ request('status')=='Selesai'?'selected':'' }}>
Selesai
</option>

</select>

</div>


<div>

<select
name="lawyer"
class="border rounded w-full p-2">

<option value="">
Semua Lawyer
</option>

@foreach($lawyers as $lawyer)

<option
value="{{ $lawyer->id }}"
{{ request('lawyer')==$lawyer->id?'selected':'' }}>

{{ $lawyer->nama }}

</option>

@endforeach

</select>

</div>


<div>

<button
class="bg-blue-600 text-white px-4 py-2 rounded">

Filter

</button>

<a href="{{ route('cases.index') }}"
class="ml-2 text-gray-600">

Reset

</a>

</div>

</div>

</form>

</div>



<a href="{{ route('cases.create') }}"
class="bg-blue-600 text-white px-4 py-2 rounded">

+ Tambah Perkara

</a>



<div class="bg-white shadow rounded-lg mt-5 overflow-hidden">

<table class="w-full">

<thead>

<tr class="border-b bg-gray-100">

<th class="p-3 text-left">Klien</th>
<th class="p-3 text-left">Lawyer</th>
<th class="p-3 text-left">Nomor</th>
<th class="p-3 text-left">Judul</th>
<th class="p-3 text-left">Status</th>
<th class="p-3 text-left">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($cases as $case)

<tr class="border-b">

<td class="p-3">
{{ $case->client->nama }}
</td>

<td class="p-3">
{{ $case->lawyer->nama ?? '-' }}
</td>

<td class="p-3">
{{ $case->nomor_perkara }}
</td>

<td class="p-3">
{{ $case->judul_perkara }}
</td>

<td class="p-3">
{{ $case->status }}
</td>

<td class="p-3">

<a href="{{ route('cases.show',$case->id) }}"
class="text-blue-600">
Lihat
</a>

<a href="{{ route('cases.edit',$case->id) }}"
class="text-green-600 ml-3">
Edit
</a>

<form
action="{{ route('cases.destroy',$case->id) }}"
method="POST"
class="inline">

@csrf
@method('DELETE')

<button
class="text-red-600 ml-3"
onclick="return confirm('Hapus perkara ini?')">

Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="6"
class="text-center p-5">

Data tidak ditemukan.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>


<div class="mt-5">

{{ $cases->links() }}

</div>

</div>

</div>

</x-app-layout>