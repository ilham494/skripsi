<x-app-layout>

<x-slot name="header">

<h2 class="font-semibold text-xl">
Tambah User
</h2>

</x-slot>


<div class="py-12">

<div class="max-w-3xl mx-auto">


<div class="bg-white shadow rounded p-6">


<form method="POST" action="{{ route('users.store') }}">

@csrf


<div class="mb-4">

<label>
Nama
</label>

<input 
name="name"
class="border rounded w-full p-2">

</div>



<div class="mb-4">

<label>
Email
</label>

<input 
type="email"
name="email"
class="border rounded w-full p-2">

</div>



<div class="mb-4">

<label>
Password
</label>

<input 
type="password"
name="password"
class="border rounded w-full p-2">

</div>



<div class="mb-4">

<label>
Role
</label>


<select 
name="role"
class="border rounded w-full p-2">


<option value="admin">
Admin
</option>


<option value="lawyer">
Lawyer
</option>


<option value="staff">
Staff
</option>


</select>


</div>



<button
class="bg-green-600 text-white px-4 py-2 rounded">

Simpan

</button>


</form>


</div>


</div>

</div>


</x-app-layout>