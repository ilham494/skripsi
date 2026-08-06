<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl">
Detail Perkara
</h2>
</x-slot>

<button onclick="downloadPDF()"
class="bg-red-600 text-white px-4 py-2 rounded">

Download PDF

</button>

<div class="py-12">

<div class="max-w-5xl mx-auto" id="pdf-content">

<div class="bg-white shadow rounded p-5">

<p>
<b>Klien:</b>
{{ $case->client->nama }}
</p>

<p>
<b>Lawyer:</b>
{{ $case->lawyer->nama ?? '-' }}
</p>

<p>
<b>Nomor Perkara:</b>
{{ $case->nomor_perkara }}
</p>

<p>
<b>Judul:</b>
{{ $case->judul_perkara }}
</p>

<p>
<b>Status:</b>
{{ $case->status }}
</p>

</div>


<div class="bg-white shadow rounded mt-5 p-5">

<h3 class="font-bold text-lg mb-3">
Dokumen
</h3>

<table class="w-full">

<thead>

<tr class="border-b">
<th class="p-3 text-left">Nama Dokumen</th>
<th class="p-3 text-left pdf-hide">File</th>
</tr>

</thead>

<tbody>

@forelse($case->documents as $document)

<tr class="border-b">

<td class="p-3">
{{ $document->nama_dokumen }}
</td>

<td class="p-3 pdf-hide">

<a href="{{ asset('storage/'.$document->file) }}"
target="_blank"
class="text-blue-600">

Download

</a>

</td>

</tr>

@empty

<tr>
<td colspan="2" class="p-3 text-center text-gray-500">
Belum ada dokumen.
</td>
</tr>

@endforelse

</tbody>

</table>

</div>


<div class="bg-white shadow rounded mt-5 p-5">

<h3 class="font-bold text-lg mb-3">
Agenda Sidang
</h3>

<table class="w-full">

<thead>

<tr class="border-b">
<th class="p-3 text-left">Tanggal</th>
<th class="p-3 text-left">Jam</th>
<th class="p-3 text-left">Tempat</th>
<th class="p-3 text-left">Agenda</th>
<th class="p-3 text-left">Status</th>
</tr>

</thead>

<tbody>

@forelse($case->hearings as $hearing)

<tr class="border-b">

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

@empty

<tr>
<td colspan="5" class="p-3 text-center text-gray-500">
Belum ada agenda sidang.
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

<style>
    @media print {
        .pdf-hide {
            display: none !important;
        }
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    function downloadPDF() {
        const element = document.getElementById('pdf-content');

        // sembunyikan kolom "File"/tombol download sementara saat generate PDF
        const hideEls = element.querySelectorAll('.pdf-hide');
        hideEls.forEach(el => el.style.display = 'none');

        const nomorPerkara = @json($case->nomor_perkara ?? 'perkara');

        const opt = {
            margin:       0.5,
            filename:     'laporan-perkara-' + nomorPerkara + '.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2, useCORS: true },
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
        };

        html2pdf().set(opt).from(element).save().then(() => {
            // munculkan lagi kolom yang disembunyikan setelah PDF selesai dibuat
            hideEls.forEach(el => el.style.display = '');
        });
    }
</script>

</x-app-layout>