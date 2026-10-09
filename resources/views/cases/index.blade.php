<x-app-layout>
<x-slot name="header">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">
            Data Perkara
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Kelola perkara, klien, lawyer, dan status perkara.
        </p>
    </div>
</x-slot>

<div class="py-8">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Page Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

            <div>
                <h3 class="text-lg font-semibold text-slate-800">
                    Daftar Perkara
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Informasi perkara yang sedang dan telah ditangani.
                </p>
            </div>

            <a href="{{ route('cases.create') }}"
               class="inline-flex items-center justify-center gap-2
                      bg-blue-600 hover:bg-blue-700
                      text-white px-4 py-2.5 rounded-lg
                      text-sm font-semibold
                      transition duration-150">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4v16m8-8H4"/>

                </svg>

                Tambah Perkara

            </a>

        </div>

        {{-- Success Message --}}
        @if(session('success'))

            <div class="mb-6 flex items-center gap-3
                        rounded-lg border border-emerald-200
                        bg-emerald-50 px-4 py-3">

                <svg class="w-5 h-5 text-emerald-600 flex-shrink-0"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 13l4 4L19 7"/>

                </svg>

                <p class="text-sm font-medium text-emerald-700">
                    {{ session('success') }}
                </p>

            </div>

        @endif

        {{-- Filter Card --}}
        <div class="bg-white border border-slate-200
                    rounded-xl shadow-sm p-5 mb-6">

            <div class="flex items-center gap-2 mb-4">

                <div class="w-9 h-9 rounded-lg
                            bg-slate-100
                            flex items-center justify-center">

                    <svg class="w-5 h-5 text-slate-500"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 12.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17v-4.586L3.293 6.707A1 1 0 013 6V4z"/>

                    </svg>

                </div>

                <div>
                    <h4 class="text-sm font-semibold text-slate-800">
                        Filter Perkara
                    </h4>

                    <p class="text-xs text-slate-400">
                        Cari dan filter data perkara.
                    </p>
                </div>

            </div>

            <form method="GET" action="{{ route('cases.index') }}">

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                    {{-- Search --}}
                    <div>

                        <label class="block text-xs font-semibold
                                      text-slate-600 mb-1.5">
                            Pencarian
                        </label>

                        <div class="relative">

                            <svg class="absolute left-3 top-1/2
                                        -translate-y-1/2
                                        w-4 h-4 text-slate-400"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="m21 21-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"/>

                            </svg>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Cari nomor / judul perkara..."
                                class="w-full pl-10 pr-3 py-2.5
                                       border border-slate-200
                                       rounded-lg
                                       text-sm text-slate-700
                                       placeholder-slate-400
                                       focus:border-blue-500
                                       focus:ring-2 focus:ring-blue-100
                                       outline-none
                                       transition">

                        </div>

                    </div>

                    {{-- Status --}}
                    <div>

                        <label class="block text-xs font-semibold
                                      text-slate-600 mb-1.5">
                            Status
                        </label>

                        <select
                            name="status"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition">

                            <option value="">
                                Semua Status
                            </option>

                            <option value="Baru"
                                {{ request('status') == 'Baru' ? 'selected' : '' }}>
                                Baru
                            </option>

                            <option value="Berjalan"
                                {{ request('status') == 'Berjalan' ? 'selected' : '' }}>
                                Berjalan
                            </option>

                            <option value="Selesai"
                                {{ request('status') == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                        </select>

                    </div>

                    {{-- Lawyer --}}
                    <div>

                        <label class="block text-xs font-semibold
                                      text-slate-600 mb-1.5">
                            Lawyer
                        </label>

                        <select
                            name="lawyer"
                            class="w-full px-3 py-2.5
                                   border border-slate-200
                                   rounded-lg
                                   text-sm text-slate-700
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-100
                                   outline-none
                                   transition">

                            <option value="">
                                Semua Lawyer
                            </option>

                            @foreach($lawyers as $lawyer)

                                <option
                                    value="{{ $lawyer->id }}"
                                    {{ request('lawyer') == $lawyer->id ? 'selected' : '' }}>

                                    {{ $lawyer->nama }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Filter Buttons --}}
                    <div class="flex items-end gap-2">

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center
                                   gap-2 px-4 py-2.5
                                   bg-blue-600 hover:bg-blue-700
                                   text-white rounded-lg
                                   text-sm font-semibold
                                   transition">

                            <svg class="w-4 h-4"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="m21 21-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"/>

                            </svg>

                            Filter

                        </button>

                        <a href="{{ route('cases.index') }}"
                           class="inline-flex items-center justify-center
                                  px-4 py-2.5
                                  bg-slate-100 hover:bg-slate-200
                                  text-slate-600 rounded-lg
                                  text-sm font-semibold
                                  transition">

                            Reset

                        </a>

                    </div>

                </div>

            </form>

        </div>

{{-- Download Buttons --}}
<div class="flex flex-wrap items-center justify-end gap-3 mb-4">

    <button
        type="button"
        id="downloadExcel"
        class="inline-flex items-center gap-2 px-4 py-2.5
               bg-emerald-600 hover:bg-emerald-700
               text-white rounded-lg text-sm font-semibold
               transition duration-150">

        <svg class="w-5 h-5"
             fill="none"
             stroke="currentColor"
             viewBox="0 0 24 24">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 10v6m0 0l-3-3m3 3l3-3
                     M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2
                     M4 4h16v8H4z"/>
        </svg>

        Download Excel
    </button>

    <button
        type="button"
        id="downloadPDF"
        class="inline-flex items-center gap-2 px-4 py-2.5
               bg-red-600 hover:bg-red-700
               text-white rounded-lg text-sm font-semibold
               transition duration-150">

        <svg class="w-5 h-5"
             fill="none"
             stroke="currentColor"
             viewBox="0 0 24 24">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M7 3h7l5 5v13H7a2 2 0 01-2-2V5a2 2 0 012-2z
                     M14 3v5h5"/>
        </svg>

        Download PDF
    </button>

</div>




        {{-- Table --}}
        <div class="bg-white border border-slate-200
                    rounded-xl shadow-sm overflow-hidden">

            <div class="overflow-x-auto">

                <table id="casesTable" class="w-full min-w-[1100px]">

                    <thead class="bg-slate-50 border-b border-slate-200">

                        <tr>

                            <th class="px-6 py-4 text-left
                                       text-xs font-semibold uppercase
                                       tracking-wider text-slate-500">
                                Klien
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-semibold uppercase
                                       tracking-wider text-slate-500">
                                Lawyer
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-semibold uppercase
                                       tracking-wider text-slate-500">
                                Nomor Perkara
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-semibold uppercase
                                       tracking-wider text-slate-500">
                                Judul Perkara
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-semibold uppercase
                                       tracking-wider text-slate-500">
                                Status
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-semibold uppercase
                                       tracking-wider text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse($cases as $case)

                            <tr class="hover:bg-slate-50 transition-colors duration-150">

                                {{-- Klien --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-full
                                                    bg-blue-100 text-blue-700
                                                    flex items-center justify-center
                                                    font-bold flex-shrink-0">

                                            {{ strtoupper(substr($case->client->nama ?? 'K', 0, 1)) }}

                                        </div>

                                        <div>

                                            <p class="font-semibold text-slate-800">
                                                {{ $case->client->nama ?? '-' }}
                                            </p>

                                            <p class="text-xs text-slate-400">
                                                Klien
                                            </p>

                                        </div>

                                    </div>

                                </td>

                                {{-- Lawyer --}}
                                <td class="px-6 py-4">

                                    @if($case->lawyer)

                                        <div class="flex items-center gap-3">

                                            <div class="w-9 h-9 rounded-full
                                                        bg-indigo-100 text-indigo-700
                                                        flex items-center justify-center
                                                        font-bold text-sm
                                                        flex-shrink-0">

                                                {{ strtoupper(substr($case->lawyer->nama, 0, 1)) }}

                                            </div>

                                            <span class="text-sm font-medium text-slate-700">
                                                {{ $case->lawyer->nama }}
                                            </span>

                                        </div>

                                    @else

                                        <span class="text-sm text-slate-400">
                                            Belum ditentukan
                                        </span>

                                    @endif

                                </td>

                                {{-- Nomor Perkara --}}
                                <td class="px-6 py-4">

                                    <span class="text-sm font-medium text-slate-700">
                                        {{ $case->nomor_perkara }}
                                    </span>

                                </td>

                                {{-- Judul Perkara --}}
                                <td class="px-6 py-4">

                                    <p class="text-sm font-medium text-slate-700
                                              max-w-xs truncate"
                                       title="{{ $case->judul_perkara }}">

                                        {{ $case->judul_perkara }}

                                    </p>

                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-4">

                                    @if($case->status === 'Baru')

                                        <span class="inline-flex items-center
                                                     px-2.5 py-1 rounded-md
                                                     bg-blue-50 text-blue-700
                                                     text-xs font-semibold">

                                            <span class="w-1.5 h-1.5 rounded-full
                                                         bg-blue-500 mr-2"></span>

                                            Baru

                                        </span>

                                    @elseif($case->status === 'Berjalan')

                                        <span class="inline-flex items-center
                                                     px-2.5 py-1 rounded-md
                                                     bg-amber-50 text-amber-700
                                                     text-xs font-semibold">

                                            <span class="w-1.5 h-1.5 rounded-full
                                                         bg-amber-500 mr-2"></span>

                                            Berjalan

                                        </span>

                                    @elseif($case->status === 'Selesai')

                                        <span class="inline-flex items-center
                                                     px-2.5 py-1 rounded-md
                                                     bg-emerald-50 text-emerald-700
                                                     text-xs font-semibold">

                                            <span class="w-1.5 h-1.5 rounded-full
                                                         bg-emerald-500 mr-2"></span>

                                            Selesai

                                        </span>

                                    @else

                                        <span class="inline-flex items-center
                                                     px-2.5 py-1 rounded-md
                                                     bg-slate-100 text-slate-600
                                                     text-xs font-semibold">

                                            {{ $case->status ?: '-' }}

                                        </span>

                                    @endif

                                </td>

                                {{-- Aksi --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-2">

                                        {{-- Lihat --}}
                                        <a href="{{ route('cases.show', $case->id) }}"
                                           class="inline-flex items-center gap-1.5
                                                  px-3 py-1.5 rounded-lg
                                                  bg-blue-50 text-blue-700
                                                  hover:bg-blue-100
                                                  text-xs font-semibold
                                                  transition">

                                            <svg class="w-4 h-4"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>

                                            </svg>

                                            Lihat

                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{ route('cases.edit', $case->id) }}"
                                           class="inline-flex items-center gap-1.5
                                                  px-3 py-1.5 rounded-lg
                                                  bg-amber-50 text-amber-700
                                                  hover:bg-amber-100
                                                  text-xs font-semibold
                                                  transition">

                                            <svg class="w-4 h-4"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>

                                            </svg>

                                            Edit

                                        </a>

                                        {{-- Hapus --}}
                                        <form
                                            action="{{ route('cases.destroy', $case->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                onclick="return confirm('Hapus perkara ini?')"
                                                class="inline-flex items-center gap-1.5
                                                       px-3 py-1.5 rounded-lg
                                                       bg-red-50 text-red-700
                                                       hover:bg-red-100
                                                       text-xs font-semibold
                                                       transition">

                                                <svg class="w-4 h-4"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h14"/>

                                                </svg>

                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="px-6 py-16">

                                    <div class="flex flex-col items-center
                                                justify-center text-center">

                                        <div class="w-14 h-14 rounded-full
                                                    bg-slate-100
                                                    flex items-center justify-center mb-4">

                                            <svg class="w-7 h-7 text-slate-400"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>

                                            </svg>

                                        </div>

                                        <h4 class="font-semibold text-slate-700">
                                            Tidak Ada Perkara
                                        </h4>

                                        <p class="text-sm text-slate-400 mt-1">
                                            Tidak ada data perkara yang sesuai dengan filter.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- Pagination --}}
        @if($cases->hasPages())

            <div class="mt-5">
                {{ $cases->links() }}
            </div>

        @endif

    </div>

</div>


{{-- Library untuk ekspor Excel dan PDF --}}
<script src="https://cdn.jsdelivr.net/npm/exceljs@4.4.0/dist/exceljs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/vfs_fonts.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const excelButton = document.getElementById('downloadExcel');
    const pdfButton = document.getElementById('downloadPDF');

    if (!excelButton || !pdfButton) return;

    const reportDate = new Intl.DateTimeFormat('id-ID', {
        day: '2-digit',
        month: 'long',
        year: 'numeric'
    }).format(new Date());

    const fileDate = new Date().toISOString().slice(0, 10);

    // Memuat logo dari public/images/logo.png
    async function getLogoBase64() {
        try {
            const response = await fetch(
                "{{ asset('images/logo.png') }}"
            );

            if (!response.ok) {
                throw new Error('File logo tidak ditemukan.');
            }

            const blob = await response.blob();

            return await new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onload = () => resolve(reader.result);
                reader.onerror = reject;
                reader.readAsDataURL(blob);
            });
        } catch (error) {
            console.warn('Logo tidak berhasil dimuat:', error);
            return null;
        }
    }

    // Mengambil data dari tabel yang sedang tampil
    function getTableData() {
        const table = document.querySelector('table');

        if (!table) {
            throw new Error('Tabel data perkara tidak ditemukan.');
        }

        const rows = Array.from(
            table.querySelectorAll('tbody tr')
        );

        const data = [];

        rows.forEach(function (row) {
            const cells = row.querySelectorAll('td');

            // Lewati baris kosong atau baris pesan "data tidak ditemukan"
            if (cells.length < 5) return;

            const clientElement = cells[0].querySelector(
                'p.font-semibold, .font-semibold'
            );

            const lawyerElement = cells[1].querySelector(
                'span.font-medium, .font-medium'
            );

            const client = clientElement
                ? clientElement.textContent.trim()
                : cells[0].textContent.trim();

            const lawyer = lawyerElement
                ? lawyerElement.textContent.trim()
                : cells[1].textContent.trim();

            const caseNumber = cells[2].textContent.trim();
            const caseTitle = cells[3].textContent.trim();
            const status = cells[4].textContent.trim();

            // Abaikan baris kosong
            if (
                !client &&
                !lawyer &&
                !caseNumber &&
                !caseTitle &&
                !status
            ) {
                return;
            }

            data.push([
                data.length + 1,
                client || '-',
                lawyer || '-',
                caseNumber || '-',
                caseTitle || '-',
                status || '-'
            ]);
        });

        if (data.length === 0) {
            throw new Error('Tidak ada data perkara untuk diekspor.');
        }

        return data;
    }

    function setLoading(button, loading, label) {
        if (loading) {
            button.dataset.originalText = button.textContent;
            button.textContent = 'Memproses...';
            button.disabled = true;
        } else {
            button.textContent =
                button.dataset.originalText || label;
            button.disabled = false;
        }
    }

    // =========================
    // EKSPOR EXCEL
    // =========================
    excelButton.addEventListener('click', async function () {
        setLoading(excelButton, true, 'Excel');

        try {
            if (typeof ExcelJS === 'undefined') {
                throw new Error('Library Excel gagal dimuat. Periksa koneksi internet.');
            }

            const rows = getTableData();
            const logo = await getLogoBase64();

            const workbook = new ExcelJS.Workbook();
            workbook.creator = 'Sistem Informasi Hukum';
            workbook.subject = 'Laporan Data Perkara';
            workbook.created = new Date();

            const worksheet = workbook.addWorksheet('Data Perkara', {
                views: [{ state: 'frozen', ySplit: 6 }]
            });

            worksheet.columns = [
                { key: 'no', width: 7 },
                { key: 'client', width: 25 },
                { key: 'lawyer', width: 25 },
                { key: 'number', width: 23 },
                { key: 'title', width: 38 },
                { key: 'status', width: 18 }
            ];

            // Ruang header laporan
            worksheet.mergeCells('C1:F1');
            worksheet.mergeCells('C2:F2');
            worksheet.mergeCells('C3:F3');

            worksheet.getCell('C1').value = 'SISTEM INFORMASI HUKUM';
            worksheet.getCell('C1').font = {
                name: 'Arial',
                size: 16,
                bold: true,
                color: { argb: 'FF1E293B' }
            };
            worksheet.getCell('C1').alignment = {
                horizontal: 'center',
                vertical: 'middle'
            };

            worksheet.getCell('C2').value = 'LAPORAN DATA PERKARA';
            worksheet.getCell('C2').font = {
                name: 'Arial',
                size: 13,
                bold: true,
                color: { argb: 'FF334155' }
            };
            worksheet.getCell('C2').alignment = {
                horizontal: 'center',
                vertical: 'middle'
            };

            worksheet.getCell('C3').value =
                'Tanggal cetak: ' + reportDate;
            worksheet.getCell('C3').font = {
                name: 'Arial',
                size: 10,
                color: { argb: 'FF475569' }
            };
            worksheet.getCell('C3').alignment = {
                horizontal: 'center',
                vertical: 'middle'
            };

            worksheet.getRow(1).height = 28;
            worksheet.getRow(2).height = 24;
            worksheet.getRow(3).height = 21;
            worksheet.getRow(4).height = 8;
            worksheet.getRow(5).height = 8;

            // Tambahkan logo jika tersedia
            if (logo) {
                const extension = logo.includes('image/jpeg')
                    ? 'jpeg'
                    : 'png';

                const imageId = workbook.addImage({
                    base64: logo.split(',')[1],
                    extension: extension
                });

                worksheet.addImage(imageId, {
                    tl: { col: 0.2, row: 0.15 },
                    br: { col: 1.8, row: 3.7 },
                    editAs: 'oneCell'
                });
            }

            // Header tabel
            const headerRow = worksheet.getRow(6);
            headerRow.values = [
                'No.',
                'Klien',
                'Lawyer',
                'Nomor Perkara',
                'Judul Perkara',
                'Status'
            ];

            headerRow.height = 28;
            headerRow.eachCell(function (cell) {
                cell.font = {
                    name: 'Arial',
                    size: 10,
                    bold: true,
                    color: { argb: 'FFFFFFFF' }
                };

                cell.fill = {
                    type: 'pattern',
                    pattern: 'solid',
                    fgColor: { argb: 'FF334155' }
                };

                cell.alignment = {
                    horizontal: 'center',
                    vertical: 'middle',
                    wrapText: true
                };

                cell.border = {
                    top: { style: 'thin', color: { argb: 'FF64748B' } },
                    left: { style: 'thin', color: { argb: 'FF64748B' } },
                    bottom: { style: 'thin', color: { argb: 'FF64748B' } },
                    right: { style: 'thin', color: { argb: 'FF64748B' } }
                };
            });

            // Isi data
            rows.forEach(function (item) {
                const row = worksheet.addRow(item);
                row.height = 32;

                row.eachCell(function (cell, columnNumber) {
                    cell.font = {
                        name: 'Arial',
                        size: 10,
                        color: { argb: 'FF1E293B' }
                    };

                    cell.alignment = {
                        vertical: 'middle',
                        horizontal: columnNumber === 1 ? 'center' : 'left',
                        wrapText: true
                    };

                    if (row.number % 2 === 0) {
                        cell.fill = {
                            type: 'pattern',
                            pattern: 'solid',
                            fgColor: { argb: 'FFF1F5F9' }
                        };
                    }

                    cell.border = {
                        top: { style: 'thin', color: { argb: 'FFCBD5E1' } },
                        left: { style: 'thin', color: { argb: 'FFCBD5E1' } },
                        bottom: { style: 'thin', color: { argb: 'FFCBD5E1' } },
                        right: { style: 'thin', color: { argb: 'FFCBD5E1' } }
                    };
                });
            });

            // Filter dan pengaturan cetak
            worksheet.autoFilter = {
                from: 'A6',
                to: 'F' + (6 + rows.length)
            };

            worksheet.pageSetup = {
                paperSize: 9,
                orientation: 'landscape',
                fitToPage: true,
                fitToWidth: 1,
                fitToHeight: 0,
                margins: {
                    left: 0.25,
                    right: 0.25,
                    top: 0.5,
                    bottom: 0.5,
                    header: 0.2,
                    footer: 0.2
                },
                printTitlesRow: '1:6'
            };

            worksheet.headerFooter.oddFooter =
                '&C Sistem Informasi Hukum | Halaman &P dari &N';

            const buffer = await workbook.xlsx.writeBuffer();
            const blob = new Blob([buffer], {
                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            });

            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');

            link.href = url;
            link.download = 'Laporan_Data_Perkara_' + fileDate + '.xlsx';
            document.body.appendChild(link);
            link.click();
            link.remove();
            URL.revokeObjectURL(url);

        } catch (error) {
            console.error('Ekspor Excel gagal:', error);
            alert(error.message || 'Gagal mengekspor Excel.');
        } finally {
            setLoading(excelButton, false, 'Excel');
        }
    });

    // =========================
    // EKSPOR PDF
    // =========================
    pdfButton.addEventListener('click', async function () {
        setLoading(pdfButton, true, 'PDF');

        try {
            if (typeof pdfMake === 'undefined') {
                throw new Error('Library PDF gagal dimuat. Periksa koneksi internet.');
            }

            const rows = getTableData();
            const logo = await getLogoBase64();

            const body = [
                [
                    { text: 'No.', style: 'tableHeader' },
                    { text: 'Klien', style: 'tableHeader' },
                    { text: 'Lawyer', style: 'tableHeader' },
                    { text: 'Nomor Perkara', style: 'tableHeader' },
                    { text: 'Judul Perkara', style: 'tableHeader' },
                    { text: 'Status', style: 'tableHeader' }
                ],
                ...rows.map(function (item) {
                    return item.map(function (value) {
                        return {
                            text: String(value ?? '-'),
                            style: 'tableCell'
                        };
                    });
                })
            ];

            const content = [];

            if (logo) {
                content.push({
                    image: logo,
                    width: 52,
                    alignment: 'center',
                    margin: [0, 0, 0, 6]
                });
            }

            content.push(
                {
                    text: 'SISTEM INFORMASI HUKUM',
                    style: 'reportHeader',
                    alignment: 'center'
                },
                {
                    text: 'LAPORAN DATA PERKARA',
                    style: 'reportTitle',
                    alignment: 'center'
                },
                {
                    text: 'Tanggal cetak: ' + reportDate,
                    style: 'reportDate',
                    alignment: 'center',
                    margin: [0, 2, 0, 14]
                },
                {
                    table: {
                        headerRows: 1,
                        widths: [28, 95, 95, 100, '*', 65],
                        body: body,
                        dontBreakRows: true,
                        keepWithHeaderRows: 1
                    },
                    layout: {
                        hLineWidth: function () { return 0.6; },
                        vLineWidth: function () { return 0.6; },
                        hLineColor: function () { return '#CBD5E1'; },
                        vLineColor: function () { return '#CBD5E1'; },
                        paddingLeft: function () { return 5; },
                        paddingRight: function () { return 5; },
                        paddingTop: function () { return 5; },
                        paddingBottom: function () { return 5; },
                        fillColor: function (rowIndex) {
                            if (rowIndex === 0) return '#334155';
                            return rowIndex % 2 === 0 ? '#F1F5F9' : null;
                        }
                    }
                }
            );

            const documentDefinition = {
                pageSize: 'A4',
                pageOrientation: 'landscape',
                pageMargins: [25, 25, 25, 40],

                content: content,

                defaultStyle: {
                    font: 'Roboto',
                    fontSize: 8,
                    color: '#1E293B'
                },

                styles: {
                    reportHeader: {
                        fontSize: 15,
                        bold: true,
                        color: '#1E293B',
                        margin: [0, 0, 0, 3]
                    },
                    reportTitle: {
                        fontSize: 12,
                        bold: true,
                        color: '#334155',
                        margin: [0, 0, 0, 2]
                    },
                    reportDate: {
                        fontSize: 8,
                        color: '#475569'
                    },
                    tableHeader: {
                        bold: true,
                        color: '#FFFFFF',
                        fontSize: 8,
                        alignment: 'center'
                    },
                    tableCell: {
                        fontSize: 8,
                        color: '#1E293B'
                    }
                },

                footer: function (currentPage, pageCount) {
                    return {
                        columns: [
                            {
                                text: 'Sistem Informasi Hukum | Laporan Data Perkara',
                                alignment: 'left'
                            },
                            {
                                text: 'Halaman ' + currentPage + ' dari ' + pageCount,
                                alignment: 'right'
                            }
                        ],
                        margin: [25, 10, 25, 0],
                        fontSize: 8,
                        color: '#64748B'
                    };
                }
            };

            pdfMake.createPdf(documentDefinition).download(
                'Laporan_Data_Perkara_' + fileDate + '.pdf'
            );

        } catch (error) {
            console.error('Ekspor PDF gagal:', error);
            alert(error.message || 'Gagal mengekspor PDF.');
        } finally {
            setLoading(pdfButton, false, 'PDF');
        }
    });
});
</script>
</x-app-layout>