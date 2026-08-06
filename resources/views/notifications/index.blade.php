<x-app-layout>

<x-slot name="header">

<h2 class="font-semibold text-xl">
Notifikasi
</h2>

</x-slot>


<div class="py-12">

<div class="max-w-5xl mx-auto">


<div class="bg-white shadow rounded-lg p-5">


<div class="mb-5">

<a href="{{ route('notifications.readAll') }}"
class="bg-blue-600 text-white px-4 py-2 rounded">

Tandai Semua Dibaca

</a>

</div>



@forelse($notifications as $notification)


<div class="border-b py-4">


<div class="flex justify-between">


<h3 class="font-bold">

{{ $notification->judul }}


@if(!$notification->dibaca)

<span class="bg-red-500 text-white text-xs px-2 py-1 rounded">

Baru

</span>

@endif


</h3>


</div>



<p class="mt-2">

{{ $notification->pesan }}

</p>



<p class="text-sm text-gray-500 mt-2">

{{ $notification->created_at->format('d-m-Y H:i') }}

</p>




@if(!$notification->dibaca)

<a href="{{ route('notifications.read',$notification->id) }}"
class="text-blue-600 mt-2 inline-block">

Tandai Dibaca

</a>

@endif



</div>



@empty


<div class="text-gray-500">

Tidak ada notifikasi.

</div>


@endforelse



</div>


</div>

</div>


</x-app-layout>