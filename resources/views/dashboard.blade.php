<x-app-layout>

<x-slot name="header">

    <h2 class="font-semibold text-xl">
        Dashboard Law Firm
    </h2>

</x-slot>



<div class="py-12">

<div class="max-w-7xl mx-auto">



{{-- Statistik --}}

<div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-6">



<div class="bg-white shadow rounded-lg p-5">

<h3 class="text-gray-500">
Total Klien
</h3>

<p class="text-3xl font-bold text-blue-600">
{{ $totalClients }}
</p>

</div>




<div class="bg-white shadow rounded-lg p-5">

<h3 class="text-gray-500">
Total Perkara
</h3>

<p class="text-3xl font-bold text-green-600">
{{ $totalCases }}
</p>

</div>




<div class="bg-white shadow rounded-lg p-5">

<h3 class="text-gray-500">
Total Lawyer
</h3>

<p class="text-3xl font-bold text-purple-600">
{{ $totalLawyers }}
</p>

</div>




<div class="bg-white shadow rounded-lg p-5">

<h3 class="text-gray-500">
Total Agenda Sidang
</h3>

<p class="text-3xl font-bold text-red-600">
{{ $totalHearings }}
</p>

</div>



</div>





{{-- Reminder Sidang Hari Ini --}}


<div class="bg-white shadow rounded-lg p-5 mb-6">


<h3 class="font-bold text-lg mb-4">

Reminder Sidang Hari Ini

</h3>



@if($todayHearings->count())


<table class="w-full">


<thead>

<tr class="border-b bg-gray-100">

<th class="p-3 text-left">
Perkara
</th>


<th class="p-3 text-left">
Jam
</th>


<th class="p-3 text-left">
Tempat
</th>


<th class="p-3 text-left">
Agenda
</th>

</tr>

</thead>



<tbody>


@foreach($todayHearings as $hearing)


<tr class="border-b">


<td class="p-3">

{{ $hearing->case->judul_perkara ?? '-' }}

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


</tr>


@endforeach


</tbody>


</table>



@else


<div class="bg-green-100 text-green-700 p-3 rounded">

Tidak ada sidang hari ini.

</div>


@endif



</div>







{{-- Perkara Terbaru --}}


<div class="bg-white shadow rounded-lg p-5 mb-6">


<h3 class="font-bold text-lg mb-4">

Perkara Terbaru

</h3>



<table class="w-full">


<thead>

<tr class="border-b bg-gray-100">


<th class="p-3 text-left">
Nomor
</th>


<th class="p-3 text-left">
Klien
</th>


<th class="p-3 text-left">
Lawyer
</th>


<th class="p-3 text-left">
Status
</th>


</tr>


</thead>



<tbody>


@foreach($recentCases as $case)


<tr class="border-b">


<td class="p-3">

{{ $case->nomor_perkara }}

</td>


<td class="p-3">

{{ $case->client->nama ?? '-' }}

</td>


<td class="p-3">

{{ $case->lawyer->nama ?? '-' }}

</td>


<td class="p-3">

{{ $case->status }}

</td>


</tr>


@endforeach


</tbody>


</table>


</div>







{{-- Agenda Sidang Terdekat --}}


<div class="bg-white shadow rounded-lg p-5 mb-6">


<h3 class="font-bold text-lg mb-4">

Agenda Sidang Terdekat

</h3>



<table class="w-full">


<thead>

<tr class="border-b bg-gray-100">


<th class="p-3 text-left">
Tanggal
</th>


<th class="p-3 text-left">
Perkara
</th>


<th class="p-3 text-left">
Agenda
</th>


<th class="p-3 text-left">
Status
</th>


</tr>


</thead>



<tbody>


@foreach($upcomingHearings as $hearing)


<tr class="border-b">


<td class="p-3">

{{ $hearing->tanggal_sidang }}

</td>


<td class="p-3">

{{ $hearing->case->judul_perkara ?? '-' }}

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







{{-- Dokumen Terbaru --}}


<div class="bg-white shadow rounded-lg p-5">


<h3 class="font-bold text-lg mb-4">

Dokumen Terbaru

</h3>


<table class="w-full">


<thead>

<tr class="border-b bg-gray-100">


<th class="p-3 text-left">
Nama Dokumen
</th>


<th class="p-3 text-left">
File
</th>


</tr>


</thead>



<tbody>


@foreach($recentDocuments as $document)


<tr class="border-b">


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


</tr>


@endforeach


</tbody>


</table>


</div>



</div>

</div>


</x-app-layout>