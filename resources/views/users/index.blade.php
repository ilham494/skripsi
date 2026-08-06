<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl">
Data User
</h2>
</x-slot>


<div class="py-12">

<div class="max-w-7xl mx-auto">


@if(session('success'))

<div class="bg-green-100 text-green-700 p-3 rounded mb-4">
{{ session('success') }}
</div>

@endif


<a href="{{ route('users.create') }}"
class="bg-blue-600 text-white px-4 py-2 rounded">

+ Tambah User

</a>



<div class="bg-white shadow rounded mt-5 overflow-hidden">


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
Role
</th>

<th class="p-3 text-left">
Aksi
</th>

</tr>

</thead>


<tbody>


@foreach($users as $user)

<tr class="border-b">


<td class="p-3">
{{ $user->name }}
</td>


<td class="p-3">
{{ $user->email }}
</td>


<td class="p-3">

<span class="px-2 py-1 rounded bg-gray-200">

{{ $user->role }}

</span>

</td>


<td class="p-3">


<a href="{{ route('users.edit',$user->id) }}"
class="text-green-600">

Edit

</a>



<form action="{{ route('users.destroy',$user->id) }}"
method="POST"
class="inline">


@csrf
@method('DELETE')


<button
onclick="return confirm('Hapus user ini?')"
class="text-red-600 ml-3">

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