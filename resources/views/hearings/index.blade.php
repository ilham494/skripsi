<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">
                Agenda Sidang
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Kelola jadwal dan agenda persidangan.
            </p>
        </div>
    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            
            {{-- Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

                <div>
                    <h3 class="text-lg font-semibold text-slate-800">
                        Daftar Agenda Sidang
                    </h3>

                    <p class="text-sm text-slate-500 mt-1">
                        Pantau jadwal persidangan yang telah terdaftar.
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

                    <a href="{{ route('hearings.create') }}"
                    class="inline-flex items-center justify-center px-4 py-2.5
                            bg-blue-600 text-white rounded-lg
                            text-sm font-semibold hover:bg-blue-700 transition">
                        + Tambah Agenda
                    </a>

                </div>

            </div>


            {{-- Success Message --}}
            @if(session('success'))

                <div class="mb-6 px-4 py-3 rounded-lg
                            bg-emerald-50 border border-emerald-200
                            text-emerald-700 text-sm">

                    {{ session('success') }}

                </div>

            @endif


            {{-- Table --}}
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[1100px]">

                        <thead class="bg-slate-50 border-b border-slate-200">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Perkara
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Tanggal
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Jam
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Tempat
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Agenda
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">

                            @forelse($hearings as $hearing)

                                <tr class="hover:bg-slate-50 transition-colors duration-150">

                                    {{-- Perkara --}}
                                    <td class="px-6 py-4">

                                        <p class="font-semibold text-slate-800">
                                            {{ $hearing->legalCase->judul_perkara ?? '-' }}
                                        </p>

                                    </td>


                                    {{-- Tanggal --}}
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <span class="text-sm text-slate-700">
                                            {{ $hearing->tanggal_sidang }}
                                        </span>

                                    </td>


                                    {{-- Jam --}}
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <span class="text-sm text-slate-700">
                                            {{ $hearing->jam ?? '-' }}
                                        </span>

                                    </td>


                                    {{-- Tempat --}}
                                    <td class="px-6 py-4">

                                        <span class="text-sm text-slate-600">
                                            {{ $hearing->tempat ?? '-' }}
                                        </span>

                                    </td>


                                    {{-- Agenda --}}
                                    <td class="px-6 py-4">

                                        <span class="text-sm text-slate-600">
                                            {{ $hearing->agenda }}
                                        </span>

                                    </td>


                                    {{-- Status --}}
                                    <td class="px-6 py-4">

                                        @php
                                            $statusStyle = match (strtolower($hearing->status ?? '')) {
                                                'terjadwal' => 'bg-blue-100 text-blue-700',
                                                'selesai' => 'bg-emerald-100 text-emerald-700',
                                                'ditunda' => 'bg-amber-100 text-amber-700',
                                                default => 'bg-slate-100 text-slate-600',
                                            };
                                        @endphp

                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full
                                                   text-xs font-semibold {{ $statusStyle }}"
                                        >
                                            {{ $hearing->status ?? '-' }}
                                        </span>

                                    </td>


                                    {{-- Aksi --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-2">

                                            <a
                                                href="{{ route('hearings.edit', $hearing->id) }}"
                                                class="inline-flex items-center px-3 py-1.5
                                                       rounded-lg bg-amber-100 text-amber-700
                                                       text-sm font-medium
                                                       hover:bg-amber-200 transition"
                                            >
                                                Edit
                                            </a>


                                            <form
                                                method="POST"
                                                action="{{ route('hearings.destroy', $hearing->id) }}"
                                                onsubmit="return confirm('Yakin ingin menghapus agenda sidang ini?');"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="inline-flex items-center px-3 py-1.5
                                                           rounded-lg bg-red-100 text-red-700
                                                           text-sm font-medium
                                                           hover:bg-red-200 transition"
                                                >
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="7"
                                        class="px-6 py-16 text-center"
                                    >

                                        <div class="flex flex-col items-center">

                                            <div class="w-14 h-14 rounded-full bg-slate-100
                                                        flex items-center justify-center mb-4">

                                                <svg
                                                    class="w-7 h-7 text-slate-400"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                    />
                                                </svg>

                                            </div>

                                            <h4 class="font-semibold text-slate-700">
                                                Belum Ada Agenda Sidang
                                            </h4>

                                            <p class="text-sm text-slate-400 mt-1">
                                                Belum ada jadwal persidangan yang terdaftar.
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

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

    function getHearingData() {
        const table = document.querySelector('table');

        if (!table) {
            throw new Error('Tabel agenda sidang tidak ditemukan.');
        }

        const data = [];

        table.querySelectorAll('tbody tr').forEach(function (row) {
            const cells = row.querySelectorAll('td');

            if (cells.length < 7) return;

            const values = [
                cells[0].textContent.trim(),
                cells[1].textContent.trim(),
                cells[2].textContent.trim(),
                cells[3].textContent.trim(),
                cells[4].textContent.trim(),
                cells[5].textContent.trim()
            ];

            // Lewati baris kosong atau pesan "Belum Ada Agenda Sidang".
            if (
                !values[0] ||
                /belum ada agenda sidang/i.test(values[0])
            ) {
                return;
            }

            data.push([
                data.length + 1,
                ...values.map(value => value || '-')
            ]);
        });

        if (!data.length) {
            throw new Error('Tidak ada agenda sidang untuk diekspor.');
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

            const data = getHearingData();
            const logo = await getLogoBase64();

            const workbook = new ExcelJS.Workbook();
            workbook.creator = 'Sistem Informasi Hukum';

            const sheet = workbook.addWorksheet('Agenda Sidang', {
                views: [{ state: 'frozen', ySplit: 6 }]
            });

            sheet.columns = [
                { width: 7 },
                { width: 34 },
                { width: 16 },
                { width: 13 },
                { width: 28 },
                { width: 32 },
                { width: 18 }
            ];

            sheet.mergeCells('C1:G1');
            sheet.mergeCells('C2:G2');
            sheet.mergeCells('C3:G3');

            sheet.getCell('C1').value = 'SISTEM INFORMASI HUKUM';
            sheet.getCell('C1').font = {
                name: 'Arial', size: 16, bold: true,
                color: { argb: 'FF1E293B' }
            };
            sheet.getCell('C1').alignment = { horizontal: 'center' };

            sheet.getCell('C2').value = 'LAPORAN AGENDA SIDANG';
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
                'Perkara',
                'Tanggal',
                'Jam',
                'Tempat',
                'Agenda',
                'Status'
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
                to: 'G' + (6 + data.length)
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
            link.download = 'Laporan_Agenda_Sidang_' + fileDate + '.xlsx';
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

            const data = getHearingData();
            const logo = await getLogoBase64();

            const body = [
                [
                    { text: 'No.', style: 'tableHeader' },
                    { text: 'Perkara', style: 'tableHeader' },
                    { text: 'Tanggal', style: 'tableHeader' },
                    { text: 'Jam', style: 'tableHeader' },
                    { text: 'Tempat', style: 'tableHeader' },
                    { text: 'Agenda', style: 'tableHeader' },
                    { text: 'Status', style: 'tableHeader' }
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
                    text: 'LAPORAN AGENDA SIDANG',
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
                        widths: [25, 105, 58, 40, 85, '*', 55],
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
                                text: 'Sistem Informasi Hukum | Laporan Agenda Sidang',
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
                'Laporan_Agenda_Sidang_' + fileDate + '.pdf'
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
