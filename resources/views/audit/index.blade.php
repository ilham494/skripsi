<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">
                Audit Log
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Riwayat aktivitas pengguna dalam sistem.
            </p>
        </div>
    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                        
            {{-- Page Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

                <div>
                    <h3 class="text-lg font-semibold text-slate-800">
                        Riwayat Aktivitas
                    </h3>

                    <p class="text-sm text-slate-500 mt-1">
                        Pantau aktivitas yang dilakukan pengguna.
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-2">

                    <button type="button"
                            id="downloadExcel"
                            class="inline-flex items-center justify-center gap-2
                                bg-emerald-600 hover:bg-emerald-700
                                text-white px-3 py-2.5 rounded-lg
                                text-sm font-semibold transition duration-150">
                        Ekspor Excel
                    </button>

                    <button type="button"
                            id="downloadPDF"
                            class="inline-flex items-center justify-center gap-2
                                bg-red-600 hover:bg-red-700
                                text-white px-3 py-2.5 rounded-lg
                                text-sm font-semibold transition duration-150">
                        Ekspor PDF
                    </button>

                    <div class="inline-flex items-center gap-2 px-4 py-2
                                bg-blue-50 border border-blue-100 rounded-lg">

                        <svg class="w-5 h-5 text-blue-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>

                        <span class="text-sm font-semibold text-blue-700">
                            {{ $logs->total() }} Aktivitas
                        </span>
                    </div>

                </div>

            </div>

            {{-- Filter --}}
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 mb-6">

                <form method="GET" action="{{ route('audit.index') }}">

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                        {{-- Search --}}
                        <div class="md:col-span-2">

                            <label
                                for="search"
                                class="block text-sm font-medium text-slate-700 mb-2">

                                Cari Aktivitas

                            </label>

                            <input
                                type="text"
                                name="search"
                                id="search"
                                value="{{ request('search') }}"
                                placeholder="Cari aktivitas atau detail..."
                                class="w-full rounded-lg border-slate-300
                                       focus:border-blue-500 focus:ring-blue-500">

                        </div>


                        {{-- User --}}
                        <div>

                            <label
                                for="user_id"
                                class="block text-sm font-medium text-slate-700 mb-2">

                                User

                            </label>

                            <select
                                name="user_id"
                                id="user_id"
                                class="w-full rounded-lg border-slate-300
                                       focus:border-blue-500 focus:ring-blue-500">

                                <option value="">
                                    Semua User
                                </option>

                                @foreach($users as $user)

                                    <option
                                        value="{{ $user->id }}"
                                        {{ request('user_id') == $user->id ? 'selected' : '' }}>

                                        {{ $user->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- Modul --}}
                        <div>

                            <label
                                for="modul"
                                class="block text-sm font-medium text-slate-700 mb-2">

                                Modul

                            </label>

                            <select
                                name="modul"
                                id="modul"
                                class="w-full rounded-lg border-slate-300
                                       focus:border-blue-500 focus:ring-blue-500">

                                <option value="">
                                    Semua Modul
                                </option>

                                @foreach($modules as $module)

                                    <option
                                        value="{{ $module }}"
                                        {{ request('modul') == $module ? 'selected' : '' }}>

                                        {{ $module }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>


                    {{-- Buttons --}}
                    <div class="flex flex-col sm:flex-row sm:justify-end gap-2 mt-5">

                        <a
                            href="{{ route('audit.index') }}"
                            class="inline-flex items-center justify-center px-4 py-2.5
                                   rounded-lg border border-slate-300
                                   text-sm font-medium text-slate-600
                                   hover:bg-slate-50 transition">

                            Reset

                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center px-5 py-2.5
                                   rounded-lg bg-blue-600
                                   text-white text-sm font-semibold
                                   hover:bg-blue-700 transition">

                            Cari / Filter

                        </button>

                    </div>

                </form>

            </div>


            {{-- Audit Table --}}
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[900px]">

                        <thead class="bg-slate-50 border-b border-slate-200">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    User
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Aktivitas
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Modul
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Detail
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Waktu
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">

                            @forelse($logs as $log)

                                <tr class="hover:bg-slate-50 transition-colors duration-150">

                                    {{-- User --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-bold">

                                                {{ strtoupper(substr($log->user->name ?? 'U', 0, 1)) }}

                                            </div>

                                            <div>

                                                <p class="font-semibold text-slate-800">
                                                    {{ $log->user->name ?? 'Unknown User' }}
                                                </p>

                                                <p class="text-xs text-slate-400">
                                                    Pengguna sistem
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- Aktivitas --}}
                                    <td class="px-6 py-4">

                                        @php

                                            $activity = strtolower($log->aktivitas ?? '');

                                            $activityStyle = match ($activity) {

                                                'login' =>
                                                    'bg-emerald-100 text-emerald-700',

                                                'logout' =>
                                                    'bg-slate-100 text-slate-700',

                                                'create',
                                                'tambah' =>
                                                    'bg-blue-100 text-blue-700',

                                                'update',
                                                'edit',
                                                'ubah' =>
                                                    'bg-amber-100 text-amber-700',

                                                'delete',
                                                'hapus' =>
                                                    'bg-red-100 text-red-700',

                                                default =>
                                                    'bg-indigo-100 text-indigo-700',

                                            };

                                        @endphp


                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $activityStyle }}">

                                            {{ $log->aktivitas }}

                                        </span>

                                    </td>


                                    {{-- Modul --}}
                                    <td class="px-6 py-4">

                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 text-xs font-medium">

                                            {{ $log->modul }}

                                        </span>

                                    </td>


                                    {{-- Detail --}}
                                    <td class="px-6 py-4 max-w-md">

                                        <p
                                            class="text-sm text-slate-600 truncate"
                                            title="{{ $log->detail }}">

                                            {{ $log->detail }}

                                        </p>

                                    </td>


                                    {{-- Waktu --}}
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <p class="text-sm font-medium text-slate-700">
                                            {{ $log->created_at->format('d M Y') }}
                                        </p>

                                        <p class="text-xs text-slate-400 mt-0.5">
                                            {{ $log->created_at->format('H:i') }}
                                        </p>

                                    </td>

                                </tr>

                            @empty

                                {{-- Empty State --}}
                                <tr>

                                    <td colspan="5" class="px-6 py-16">

                                        <div class="flex flex-col items-center justify-center text-center">

                                            <div class="w-14 h-14 rounded-full bg-slate-100 flex items-center justify-center mb-4">

                                                <svg
                                                    class="w-7 h-7 text-slate-400"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A2 2 0 0119 9.414V19a2 2 0 01-2 2z"
                                                    />

                                                </svg>

                                            </div>

                                            <h4 class="font-semibold text-slate-700">
                                                Belum Ada Aktivitas
                                            </h4>

                                            <p class="text-sm text-slate-400 mt-1 max-w-sm">
                                                Tidak ditemukan aktivitas yang sesuai dengan filter.
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
            @if($logs->hasPages())

                <div class="mt-6">

                    {{ $logs->links() }}

                </div>

            @endif

        </div>

    </div>

        
    <script src="https://cdn.jsdelivr.net/npm/exceljs@4.4.0/dist/exceljs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/vfs_fonts.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const excelButton = document.getElementById('downloadExcel');
        const pdfButton = document.getElementById('downloadPDF');

        if (!excelButton || !pdfButton) return;

        const now = new Date();

        const reportDate = new Intl.DateTimeFormat('id-ID', {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        }).format(now);

        const fileDate = [
            now.getFullYear(),
            String(now.getMonth() + 1).padStart(2, '0'),
            String(now.getDate()).padStart(2, '0')
        ].join('-');

        async function getLogoBase64() {
            try {
                const response = await fetch("{{ asset('images/logo.png') }}");
                if (!response.ok) throw new Error('Logo tidak ditemukan.');

                const blob = await response.blob();

                return await new Promise((resolve, reject) => {
                    const reader = new FileReader();
                    reader.onload = () => resolve(reader.result);
                    reader.onerror = reject;
                    reader.readAsDataURL(blob);
                });
            } catch (error) {
                console.warn('Logo tidak tersedia:', error);
                return null;
            }
        }

        function getAuditData() {
            const table = document.querySelector('table');

            if (!table) {
                throw new Error('Tabel audit log tidak ditemukan.');
            }

            const data = [];

            table.querySelectorAll('tbody tr').forEach(function (row) {
                const cells = row.querySelectorAll('td');

                // Tabel audit log memiliki lima kolom.
                if (cells.length < 5) return;

                const userElement = cells[0].querySelector('.font-semibold');

                const user = userElement
                    ? userElement.textContent.trim()
                    : cells[0].textContent.trim();

                // Lewati baris pesan kosong.
                if (
                    !user ||
                    /belum ada aktivitas/i.test(user)
                ) {
                    return;
                }

                const activity = cells[1].textContent.trim();
                const module = cells[2].textContent.trim();

                // Gunakan atribut title agar detail tidak terpotong
                // oleh class truncate di tampilan halaman.
                const detailElement = cells[3].querySelector('[title]');
                const detail = detailElement
                    ? detailElement.getAttribute('title').trim()
                    : cells[3].textContent.trim();

                const dateElement = cells[4].querySelector('p');
                const timeElements = cells[4].querySelectorAll('p');

                const date = timeElements[0]
                    ? timeElements[0].textContent.trim()
                    : cells[4].textContent.trim();

                const time = timeElements[1]
                    ? timeElements[1].textContent.trim()
                    : '';

                data.push([
                    data.length + 1,
                    user || '-',
                    activity || '-',
                    module || '-',
                    detail || '-',
                    [date, time].filter(Boolean).join(' ')
                ]);
            });

            if (!data.length) {
                throw new Error('Tidak ada aktivitas untuk diekspor.');
            }

            return data;
        }

        function setLoading(button, loading) {
            if (loading) {
                button.dataset.originalText = button.textContent;
                button.textContent = 'Memproses...';
                button.disabled = true;
            } else {
                button.textContent = button.dataset.originalText || '';
                button.disabled = false;
            }
        }

        // =========================
        // EKSPOR EXCEL
        // =========================
        excelButton.addEventListener('click', async function () {
            setLoading(excelButton, true);

            try {
                if (typeof ExcelJS === 'undefined') {
                    throw new Error('Library Excel gagal dimuat. Periksa koneksi internet.');
                }

                const data = getAuditData();
                const logo = await getLogoBase64();

                const workbook = new ExcelJS.Workbook();
                workbook.creator = 'Sistem Informasi Hukum';

                const sheet = workbook.addWorksheet('Audit Log', {
                    views: [{ state: 'frozen', ySplit: 6 }]
                });

                sheet.columns = [
                    { width: 7 },
                    { width: 25 },
                    { width: 20 },
                    { width: 20 },
                    { width: 50 },
                    { width: 24 }
                ];

                sheet.mergeCells('C1:F1');
                sheet.mergeCells('C2:F2');
                sheet.mergeCells('C3:F3');

                sheet.getCell('C1').value = 'SISTEM INFORMASI HUKUM';
                sheet.getCell('C1').font = {
                    name: 'Arial', size: 16, bold: true,
                    color: { argb: 'FF1E293B' }
                };
                sheet.getCell('C1').alignment = { horizontal: 'center' };

                sheet.getCell('C2').value = 'LAPORAN AUDIT LOG';
                sheet.getCell('C2').font = {
                    name: 'Arial', size: 13, bold: true,
                    color: { argb: 'FF334155' }
                };
                sheet.getCell('C2').alignment = { horizontal: 'center' };

                sheet.getCell('C3').value = 'Tanggal cetak: ' + reportDate;
                sheet.getCell('C3').font = {
                    name: 'Arial', size: 10,
                    color: { argb: 'FF475569' }
                };
                sheet.getCell('C3').alignment = { horizontal: 'center' };

                sheet.getRow(1).height = 28;
                sheet.getRow(2).height = 24;
                sheet.getRow(3).height = 21;
                sheet.getRow(4).height = 8;
                sheet.getRow(5).height = 8;

                if (logo) {
                    const imageId = workbook.addImage({
                        base64: logo.split(',')[1],
                        extension: logo.includes('image/jpeg') ? 'jpeg' : 'png'
                    });

                    sheet.addImage(imageId, {
                        tl: { col: 0.2, row: 0.15 },
                        br: { col: 1.8, row: 3.7 }
                    });
                }

                const header = sheet.getRow(6);
                header.values = [
                    'No.',
                    'User',
                    'Aktivitas',
                    'Modul',
                    'Detail',
                    'Waktu'
                ];
                header.height = 28;

                header.eachCell(function (cell) {
                    cell.font = {
                        name: 'Arial', size: 10, bold: true,
                        color: { argb: 'FFFFFFFF' }
                    };
                    cell.fill = {
                        type: 'pattern', pattern: 'solid',
                        fgColor: { argb: 'FF334155' }
                    };
                    cell.alignment = {
                        horizontal: 'center',
                        vertical: 'middle',
                        wrapText: true
                    };
                    cell.border = {
                        top: { style: 'thin', color: { argb: 'FF94A3B8' } },
                        left: { style: 'thin', color: { argb: 'FF94A3B8' } },
                        bottom: { style: 'thin', color: { argb: 'FF94A3B8' } },
                        right: { style: 'thin', color: { argb: 'FF94A3B8' } }
                    };
                });

                data.forEach(function (item) {
                    const row = sheet.addRow(item);
                    row.height = 32;

                    row.eachCell(function (cell, col) {
                        cell.font = {
                            name: 'Arial', size: 10,
                            color: { argb: 'FF1E293B' }
                        };
                        cell.alignment = {
                            vertical: 'middle',
                            horizontal: col === 1 ? 'center' : 'left',
                            wrapText: true
                        };

                        if (row.number % 2 === 0) {
                            cell.fill = {
                                type: 'pattern', pattern: 'solid',
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

                sheet.autoFilter = {
                    from: 'A6',
                    to: 'F' + (6 + data.length)
                };

                sheet.pageSetup = {
                    paperSize: 9,
                    orientation: 'landscape',
                    fitToPage: true,
                    fitToWidth: 1,
                    fitToHeight: 0,
                    printTitlesRow: '1:6'
                };

                sheet.headerFooter.oddFooter =
                    '&C Sistem Informasi Hukum | Halaman &P dari &N';

                const buffer = await workbook.xlsx.writeBuffer();
                const blob = new Blob([buffer], {
                    type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                });

                const url = URL.createObjectURL(blob);
                const link = document.createElement('a');

                link.href = url;
                link.download = 'Laporan_Audit_Log_' + fileDate + '.xlsx';
                document.body.appendChild(link);
                link.click();
                link.remove();

                setTimeout(() => URL.revokeObjectURL(url), 1000);

            } catch (error) {
                console.error('Ekspor Excel gagal:', error);
                alert(error.message || 'Gagal mengekspor Excel.');
            } finally {
                setLoading(excelButton, false);
            }
        });

        // =========================
        // EKSPOR PDF
        // =========================
        pdfButton.addEventListener('click', async function () {
            setLoading(pdfButton, true);

            try {
                if (typeof pdfMake === 'undefined') {
                    throw new Error('Library PDF gagal dimuat. Periksa koneksi internet.');
                }

                const data = getAuditData();
                const logo = await getLogoBase64();

                const body = [
                    [
                        { text: 'No.', style: 'tableHeader' },
                        { text: 'User', style: 'tableHeader' },
                        { text: 'Aktivitas', style: 'tableHeader' },
                        { text: 'Modul', style: 'tableHeader' },
                        { text: 'Detail', style: 'tableHeader' },
                        { text: 'Waktu', style: 'tableHeader' }
                    ],
                    ...data.map(item =>
                        item.map(value => ({
                            text: String(value ?? '-'),
                            style: 'tableCell'
                        }))
                    )
                ];

                const content = [];

                if (logo) {
                    content.push({
                        image: logo,
                        width: 50,
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
                        text: 'LAPORAN AUDIT LOG',
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
                            widths: [25, 75, 65, 65, '*', 75],
                            body: body,
                            dontBreakRows: true,
                            keepWithHeaderRows: 1
                        },
                        layout: {
                            hLineWidth: () => 0.6,
                            vLineWidth: () => 0.6,
                            hLineColor: () => '#CBD5E1',
                            vLineColor: () => '#CBD5E1',
                            paddingLeft: () => 4,
                            paddingRight: () => 4,
                            paddingTop: () => 5,
                            paddingBottom: () => 5,
                            fillColor: function (rowIndex) {
                                if (rowIndex === 0) return '#334155';
                                return rowIndex % 2 === 0 ? '#F1F5F9' : null;
                            }
                        }
                    }
                );

                const docDefinition = {
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
                            fontSize: 7,
                            color: '#1E293B'
                        }
                    },

                    footer: function (page, pages) {
                        return {
                            columns: [
                                {
                                    text: 'Sistem Informasi Hukum | Laporan Audit Log',
                                    alignment: 'left'
                                },
                                {
                                    text: 'Halaman ' + page + ' dari ' + pages,
                                    alignment: 'right'
                                }
                            ],
                            margin: [25, 10, 25, 0],
                            fontSize: 8,
                            color: '#64748B'
                        };
                    }
                };

                pdfMake.createPdf(docDefinition).download(
                    'Laporan_Audit_Log_' + fileDate + '.pdf'
                );

            } catch (error) {
                console.error('Ekspor PDF gagal:', error);
                alert(error.message || 'Gagal mengekspor PDF.');
            } finally {
                setLoading(pdfButton, false);
            }
        });
    });
    </script>
    </x-app-layout>
