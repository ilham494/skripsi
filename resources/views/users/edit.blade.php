<x-app-layout>

<x-slot name="header">

<h2 class="font-semibold text-xl">
Edit User
</h2>

</x-slot>


<div class="py-12">

<div class="max-w-3xl mx-auto">


<div class="bg-white shadow rounded p-6">


<form method="POST"
action="{{ route('users.update',$user->id) }}">


@csrf

@method('PUT')



<div class="mb-4">

<label>
Nama
</label>

<input
name="name"
value="{{ $user->name }}"
class="border rounded w-full p-2">

</div>



<div class="mb-4">

<label>
Email
</label>

<input
name="email"
value="{{ $user->email }}"
class="border rounded w-full p-2">

</div>



<div class="mb-4">

<label>
Role
</label>


<select name="role"
class="border rounded w-full p-2">


<option value="admin"
{{ $user->role=='admin'?'selected':'' }}>

Admin

</option>


<option value="lawyer"
{{ $user->role=='lawyer'?'selected':'' }}>

Lawyer

</option>


<option value="staff"
{{ $user->role=='staff'?'selected':'' }}>

Staff

</option>


</select>


</div>



<button
class="bg-green-600 text-white px-4 py-2 rounded">

Update

</button>


</form>


</div>


</div>

</div>


</x-app-layout>