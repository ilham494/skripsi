<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl">
        Edit Perkara
    </h2>
</x-slot>


<div class="py-12">

<div class="max-w-3xl mx-auto">


<form method="POST"
action="{{ route('cases.update',$case->id) }}">

@csrf
@method('PUT')


<div class="mb-4">

<label>Klien</label>

<select name="client_id"
class="border rounded w-full p-2">

@foreach($clients as $client)

<option value="{{ $client->id }}"
@if($client->id == $case->client_id)
selected
@endif
>
{{ $client->nama }}
</option>

@endforeach

</select>

</div>


<div class="mb-4">

<label>Nomor Perkara</label>

<input name="nomor_perkara"
value="{{ $case->nomor_perkara }}"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Judul Perkara</label>

<input name="judul_perkara"
value="{{ $case->judul_perkara }}"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Jenis Perkara</label>

<input name="jenis_perkara"
value="{{ $case->jenis_perkara }}"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Status</label>

<select name="status"
class="border rounded w-full p-2">

<option {{ $case->status == 'Baru' ? 'selected' : '' }}>
Baru
</option>

<option {{ $case->status == 'Berjalan' ? 'selected' : '' }}>
Berjalan
</option>

<option {{ $case->status == 'Selesai' ? 'selected' : '' }}>
Selesai
</option>

</select>

</div>


<div class="mb-4">

<label>Tanggal Mulai</label>

<input type="date"
name="tanggal_mulai"
value="{{ $case->tanggal_mulai }}"
class="border rounded w-full p-2">

</div>


<div class="mb-4">

<label>Deskripsi</label>

<textarea name="deskripsi"
class="border rounded w-full p-2">{{ $case->deskripsi }}</textarea>

</div>


<button class="bg-green-600 text-white px-4 py-2 rounded">
Update
</button>


</form>


</div>

</div>

</x-app-layout>