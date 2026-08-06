<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl">
        Data Lawyer
    </h2>
</x-slot>


<div class="py-12">

<div class="max-w-7xl mx-auto">


<a href="{{ route('lawyers.create') }}"
class="bg-blue-600 text-white px-4 py-2 rounded">
+ Tambah Lawyer
</a>


@if(session('success'))

<div class="bg-green-100 text-green-700 p-3 rounded mt-4">
{{ session('success') }}
</div>

@endif


<div class="bg-white shadow rounded-lg mt-5 overflow-hidden">

<table class="w-full">


<thead>

<tr class="border-b bg-gray-100">

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
Spesialisasi
</th>

<th class="p-3 text-left">
Aksi
</th>

</tr>

</thead>


<tbody>

@foreach($lawyers as $lawyer)

<tr class="border-b">


<td class="p-3">
{{ $lawyer->nama }}
</td>


<td class="p-3">
{{ $lawyer->email }}
</td>


<td class="p-3">
{{ $lawyer->telepon }}
</td>


<td class="p-3">
{{ $lawyer->spesialisasi }}
</td>


<td class="p-3">


<a href="{{ route('lawyers.edit',$lawyer->id) }}"
class="text-green-600">
Edit
</a>


<form action="{{ route('lawyers.destroy',$lawyer->id) }}"
method="POST"
class="inline">

@csrf
@method('DELETE')

<button
class="text-red-600 ml-3"
onclick="return confirm('Hapus lawyer ini?')">
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