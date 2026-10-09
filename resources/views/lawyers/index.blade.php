<x-app-layout>
<x-slot name="header">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">
            Data Lawyer
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Kelola data lawyer yang terdaftar dalam sistem.
        </p>
    </div>
</x-slot>

<div class="py-8">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        {{-- Page Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

            <div>
                <h3 class="text-lg font-semibold text-slate-800">
                    Daftar Lawyer
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Informasi lawyer dan spesialisasinya.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-2">

                <button type="button"
                        id="downloadExcel"
                        class="inline-flex items-center justify-center gap-2
                            bg-emerald-600 hover:bg-emerald-700
                            text-white px-3 py-2.5 rounded-lg
                            text-sm font-semibold transition duration-150">
                    <span>Ekspor Excel</span>
                </button>

                <button type="button"
                        id="downloadPDF"
                        class="inline-flex items-center justify-center gap-2
                            bg-red-600 hover:bg-red-700
                            text-white px-3 py-2.5 rounded-lg
                            text-sm font-semibold transition duration-150">
                    <span>Ekspor PDF</span>
                </button>

                <a href="{{ route('lawyers.create') }}"
                class="inline-flex items-center justify-center gap-2
                        bg-blue-600 hover:bg-blue-700
                        text-white px-4 py-2.5 rounded-lg
                        text-sm font-semibold transition duration-150">

                    <svg class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4v16m8-8H4"/>
                    </svg>

                    Tambah Lawyer
                </a>

            </div>

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


        {{-- Table --}}
        <div class="bg-white border border-slate-200
                    rounded-xl shadow-sm overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full min-w-[900px]">

                    <thead class="bg-slate-50 border-b border-slate-200">

                        <tr>

                            <th class="px-6 py-4 text-left
                                       text-xs font-semibold uppercase
                                       tracking-wider text-slate-500">
                                Lawyer
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-semibold uppercase
                                       tracking-wider text-slate-500">
                                Email
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-semibold uppercase
                                       tracking-wider text-slate-500">
                                Telepon
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-semibold uppercase
                                       tracking-wider text-slate-500">
                                Spesialisasi
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-semibold uppercase
                                       tracking-wider text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @forelse($lawyers as $lawyer)

                            <tr class="hover:bg-slate-50 transition-colors duration-150">

                                {{-- Lawyer --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-full
                                                    bg-blue-100 text-blue-700
                                                    flex items-center justify-center
                                                    font-bold flex-shrink-0">

                                            {{ strtoupper(substr($lawyer->nama ?? 'L', 0, 1)) }}

                                        </div>

                                        <div>

                                            <p class="font-semibold text-slate-800">
                                                {{ $lawyer->nama }}
                                            </p>

                                            <p class="text-xs text-slate-400">
                                                Lawyer
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- Email --}}
                                <td class="px-6 py-4">

                                    <span class="text-sm text-slate-600">
                                        {{ $lawyer->email ?: '-' }}
                                    </span>

                                </td>


                                {{-- Telepon --}}
                                <td class="px-6 py-4">

                                    <span class="text-sm text-slate-600">
                                        {{ $lawyer->telepon ?: '-' }}
                                    </span>

                                </td>


                                {{-- Spesialisasi --}}
                                <td class="px-6 py-4">

                                    @if($lawyer->spesialisasi)

                                        <span class="inline-flex items-center
                                                     px-2.5 py-1 rounded-md
                                                     bg-blue-50 text-blue-700
                                                     text-xs font-medium">

                                            {{ $lawyer->spesialisasi }}

                                        </span>

                                    @else

                                        <span class="text-sm text-slate-400">
                                            -
                                        </span>

                                    @endif

                                </td>


                                {{-- Aksi --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-2">

                                        <a href="{{ route('lawyers.edit', $lawyer->id) }}"
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


                                        <form action="{{ route('lawyers.destroy', $lawyer->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    onclick="return confirm('Hapus lawyer ini?')"
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

                                <td colspan="5" class="px-6 py-16">

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
                                                      d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m8-10a4 4 0 100-8 4 4 0 000 8zm6-3a4 4 0 110-8 4 4 0 010 8zm0 0v8"/>
                                            </svg>

                                        </div>

                                        <h4 class="font-semibold text-slate-700">
                                            Belum Ada Lawyer
                                        </h4>

                                        <p class="text-sm text-slate-400 mt-1">
                                            Belum ada data lawyer yang terdaftar.
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

    const today = new Date();
    const reportDate = new Intl.DateTimeFormat('id-ID', {
        day: '2-digit',
        month: 'long',
        year: 'numeric'
    }).format(today);

    const fileDate = [
        today.getFullYear(),
        String(today.getMonth() + 1).padStart(2, '0'),
        String(today.getDate()).padStart(2, '0')
    ].join('-');

    async function getLogoBase64() {
        try {
            const response = await fetch(
                "{{ asset('images/logo.png') }}"
            );

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

    function getLawyerData() {
        const table = document.querySelector('table');
        if (!table) throw new Error('Tabel lawyer tidak ditemukan.');

        const data = [];

        table.querySelectorAll('tbody tr').forEach(function (row) {
            const cells = row.querySelectorAll('td');

            // Abaikan baris kosong atau pesan belum ada data.
            if (cells.length < 5) return;

            const nameElement = cells[0].querySelector('.font-semibold');
            const name = nameElement
                ? nameElement.textContent.trim()
                : cells[0].textContent.trim();

            // Lewati pesan "Belum Ada Lawyer".
            if (!name || /belum ada lawyer/i.test(name)) return;

            const email = cells[1].textContent.trim() || '-';
            const phone = cells[2].textContent.trim() || '-';
            const specialization = cells[3].textContent.trim() || '-';

            data.push([
                data.length + 1,
                name,
                email,
                phone,
                specialization
            ]);
        });

        if (!data.length) {
            throw new Error('Tidak ada data lawyer untuk diekspor.');
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
                throw new Error('Library Excel gagal dimuat.');
            }

            const data = getLawyerData();
            const logo = await getLogoBase64();

            const workbook = new ExcelJS.Workbook();
            workbook.creator = 'Sistem Informasi Hukum';

            const sheet = workbook.addWorksheet('Data Lawyer', {
                views: [{ state: 'frozen', ySplit: 6 }]
            });

            sheet.columns = [
                { width: 7 },
                { width: 30 },
                { width: 32 },
                { width: 20 },
                { width: 30 }
            ];

            sheet.mergeCells('C1:E1');
            sheet.mergeCells('C2:E2');
            sheet.mergeCells('C3:E3');

            sheet.getCell('C1').value = 'SISTEM INFORMASI HUKUM';
            sheet.getCell('C1').font = {
                name: 'Arial', size: 16, bold: true,
                color: { argb: 'FF1E293B' }
            };
            sheet.getCell('C1').alignment = { horizontal: 'center' };

            sheet.getCell('C2').value = 'LAPORAN DATA LAWYER';
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
                'No.', 'Nama Lawyer', 'Email', 'Telepon', 'Spesialisasi'
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
                    horizontal: 'center', vertical: 'middle',
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
                row.height = 28;

                row.eachCell(function (cell, col) {
                    cell.font = { name: 'Arial', size: 10, color: { argb: 'FF1E293B' } };
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
                to: 'E' + (6 + data.length)
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
            link.download = 'Laporan_Data_Lawyer_' + fileDate + '.xlsx';
            document.body.appendChild(link);
            link.click();
            link.remove();
            setTimeout(() => URL.revokeObjectURL(url), 1000);

        } catch (error) {
            console.error(error);
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
                throw new Error('Library PDF gagal dimuat.');
            }

            const data = getLawyerData();
            const logo = await getLogoBase64();

            const body = [
                [
                    { text: 'No.', style: 'tableHeader' },
                    { text: 'Nama Lawyer', style: 'tableHeader' },
                    { text: 'Email', style: 'tableHeader' },
                    { text: 'Telepon', style: 'tableHeader' },
                    { text: 'Spesialisasi', style: 'tableHeader' }
                ],
                ...data.map((item) =>
                    item.map((value) => ({
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
                    text: 'LAPORAN DATA LAWYER',
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
                        widths: [30, '*', 150, 90, 130],
                        body: body,
                        dontBreakRows: true,
                        keepWithHeaderRows: 1
                    },
                    layout: {
                        hLineWidth: () => 0.6,
                        vLineWidth: () => 0.6,
                        hLineColor: () => '#CBD5E1',
                        vLineColor: () => '#CBD5E1',
                        paddingLeft: () => 5,
                        paddingRight: () => 5,
                        paddingTop: () => 6,
                        paddingBottom: () => 6,
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
                pageMargins: [28, 25, 28, 40],
                content: content,

                defaultStyle: {
                    font: 'Roboto',
                    fontSize: 9,
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
                        fontSize: 9,
                        alignment: 'center'
                    },
                    tableCell: {
                        fontSize: 8,
                        color: '#1E293B'
                    }
                },

                footer: function (page, pages) {
                    return {
                        columns: [
                            {
                                text: 'Sistem Informasi Hukum | Laporan Data Lawyer',
                                alignment: 'left'
                            },
                            {
                                text: 'Halaman ' + page + ' dari ' + pages,
                                alignment: 'right'
                            }
                        ],
                        margin: [28, 10, 28, 0],
                        fontSize: 8,
                        color: '#64748B'
                    };
                }
            };

            pdfMake.createPdf(docDefinition).download(
                'Laporan_Data_Lawyer_' + fileDate + '.pdf'
            );

        } catch (error) {
            console.error(error);
            alert(error.message || 'Gagal mengekspor PDF.');
        } finally {
            setLoading(pdfButton, false);
        }
    });
});
</script>
</x-app-layout>
