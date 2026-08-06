<x-app-layout>

<x-slot name="header">

<h2 class="font-semibold text-xl">
Audit Log Sistem
</h2>

</x-slot>



<div class="py-12">

<div class="max-w-7xl mx-auto">


<div class="bg-white shadow rounded-lg overflow-hidden">


<table class="w-full">


<thead>

<tr class="border-b bg-gray-100">

<th class="p-3 text-left">
User
</th>

<th class="p-3 text-left">
Aktivitas
</th>

<th class="p-3 text-left">
Modul
</th>

<th class="p-3 text-left">
Detail
</th>

<th class="p-3 text-left">
Waktu
</th>

</tr>

</thead>



<tbody>


@foreach($logs as $log)


<tr class="border-b">


<td class="p-3">

{{ $log->user->name ?? '-' }}

</td>


<td class="p-3">

{{ $log->aktivitas }}

</td>


<td class="p-3">

{{ $log->modul }}

</td>


<td class="p-3">

{{ $log->detail }}

</td>


<td class="p-3">

{{ $log->created_at->format('d-m-Y H:i') }}

</td>


</tr>


@endforeach


</tbody>


</table>


</div>



<div class="mt-5">

{{ $logs->links() }}

</div>



</div>

</div>


</x-app-layout>
