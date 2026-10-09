<x-app-layout>
<x-slot name="header">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">
            Data Klien
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Kelola data klien yang terdaftar dalam sistem.
        </p>
    </div>
</x-slot>


<div class="py-8">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Page Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

            <div>
                <h3 class="text-lg font-semibold text-slate-800">
                    Daftar Klien
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Informasi klien yang terdaftar dalam sistem.
                </p>
            </div>


            <a href="{{ route('clients.create') }}"
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

                Tambah Klien

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


        {{-- Table --}}
        <div class="bg-white border border-slate-200
                    rounded-xl shadow-sm overflow-hidden">

            <div class="overflow-x-auto">

                <table id="clientsTable" class="w-full min-w-[800px]">



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
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @forelse($clients as $client)

                            <tr class="hover:bg-slate-50 transition-colors duration-150">

                                {{-- Klien --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-full
                                                    bg-blue-100 text-blue-700
                                                    flex items-center justify-center
                                                    font-bold flex-shrink-0">

                                            {{ strtoupper(substr($client->nama ?? 'K', 0, 1)) }}

                                        </div>

                                        <div>

                                            <p class="client-name font-semibold text-slate-800">
                                                {{ $client->nama }}
                                            </p>

                                            <p class="text-xs text-slate-400">
                                                Klien
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- Email --}}
                                <td class="px-6 py-4">

                                    <span class="text-sm text-slate-600">
                                        {{ $client->email ?: '-' }}
                                    </span>

                                </td>


                                {{-- Telepon --}}
                                <td class="px-6 py-4">

                                    <span class="text-sm text-slate-600">
                                        {{ $client->telepon ?: '-' }}
                                    </span>

                                </td>


                                {{-- Aksi --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-2">

                                        {{-- Edit --}}
                                        <a href="{{ route('clients.edit', $client->id) }}"
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
                                        <form action="{{ route('clients.destroy', $client->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    onclick="return confirm('Hapus klien ini?')"
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

                                <td colspan="4" class="px-6 py-16">

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
                                            Belum Ada Klien
                                        </h4>

                                        <p class="text-sm text-slate-400 mt-1">
                                            Belum ada data klien yang terdaftar.
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

{{-- DataTables CSS --}}
<link rel="stylesheet"
      href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
<link rel="stylesheet"
      href="https://cdn.datatables.net/buttons/3.2.3/css/buttons.dataTables.min.css">

<style>
    #clientsTable_wrapper {
        color: #475569;
        font-size: 14px;
    }

    #clientsTable_wrapper .dt-search input,
    #clientsTable_wrapper .dt-length select {
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        padding: 7px 10px;
        background: white;
    }

    #clientsTable_wrapper .dt-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 16px;
    }

    #clientsTable_wrapper .dt-buttons .dt-button {
        border: none !important;
        border-radius: 8px !important;
        padding: 9px 14px !important;
        color: white !important;
        font-weight: 600 !important;
        cursor: pointer;
        margin: 0 !important;
    }

    #clientsTable_wrapper .buttons-pdf {
        background: #dc2626 !important;
    }

    #clientsTable_wrapper .buttons-excel {
        background: #15803d !important;
    }

    #clientsTable_wrapper .buttons-pdf:hover {
        background: #b91c1c !important;
    }

    #clientsTable_wrapper .buttons-excel:hover {
        background: #166534 !important;
    }

    #clientsTable thead th {
        background: #f8fafc;
    }
</style>

{{-- Dependencies CDN --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/3.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.html5.min.js"></script>

{{-- ExcelJS untuk ekspor Excel dengan logo --}}
<script src="https://cdn.jsdelivr.net/npm/exceljs@4.4.0/dist/exceljs.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const selector = '#clientsTable';
    const table = document.querySelector(selector);

    if (!table) return;

    // Jangan inisialisasi tabel ketika belum ada data klien.
    if (table.querySelector('tbody td[colspan]')) return;

    if (DataTable.isDataTable(selector)) return;

    // Mengambil logo dari public/images/logo.png.
    const logoBase64 = @json(
        file_exists(public_path('images/logo.png'))
            ? 'data:image/png;base64,' .
                base64_encode(file_get_contents(public_path('images/logo.png')))
            : null
    );

    function cleanExport(data, row, column, node) {
        if (column === 0) {
            const name = node.querySelector('.client-name');
            return name ? name.textContent.trim() : node.textContent.trim();
        }

        return node.textContent.replace(/\s+/g, ' ').trim();
    }

    new DataTable(selector, {
        pageLength: 10,
        order: [],
        layout: {
            topStart: {
                buttons: [
                    {
                        text: 'Download Excel',
                        className: 'buttons-excel',
                        action: async function (e, dt) {
                            const workbook = new ExcelJS.Workbook();
                            const sheet = workbook.addWorksheet('Data Klien');

                            sheet.columns = [
                                { header: 'No.', key: 'no', width: 8 },
                                { header: 'Nama Klien', key: 'nama', width: 30 },
                                { header: 'Email', key: 'email', width: 35 },
                                { header: 'Telepon', key: 'telepon', width: 20 }
                            ];

                            // Sisakan ruang di bagian atas untuk logo dan judul.
                            sheet.spliceRows(1, 0, [], [], [], [], []);
                            sheet.mergeCells('A4:D4');
                            sheet.getCell('A4').value = 'DATA KLIEN';
                            sheet.getCell('A4').font = {
                                bold: true,
                                size: 16
                            };
                            sheet.getCell('A4').alignment = {
                                horizontal: 'center'
                            };

                            if (logoBase64) {
                                const imageId = workbook.addImage({
                                    base64: logoBase64,
                                    extension: 'png'
                                });

                                sheet.addImage(imageId, {
                                    tl: { col: 0, row: 0 },
                                    ext: { width: 90, height: 65 }
                                });
                            }

                            const headerRow = sheet.getRow(6);
                            headerRow.values = [
                                'No.',
                                'Nama Klien',
                                'Email',
                                'Telepon'
                            ];
                            headerRow.font = { bold: true, color: { argb: 'FFFFFFFF' } };
                            headerRow.fill = {
                                type: 'pattern',
                                pattern: 'solid',
                                fgColor: { argb: 'FF334155' }
                            };
                            headerRow.alignment = { vertical: 'middle' };

                            const rows = dt.rows({ search: 'applied' }).nodes().toArray();

                            rows.forEach((tr, index) => {
                                const cells = tr.querySelectorAll('td');

                                sheet.addRow([
                                    index + 1,
                                    cleanExport('', index, 0, cells[0]),
                                    cleanExport('', index, 1, cells[1]),
                                    cleanExport('', index, 2, cells[2])
                                ]);
                            });

                            sheet.eachRow((row, rowNumber) => {
                                if (rowNumber >= 6) {
                                    row.eachCell(cell => {
                                        cell.border = {
                                            top: { style: 'thin', color: { argb: 'FFCBD5E1' } },
                                            left: { style: 'thin', color: { argb: 'FFCBD5E1' } },
                                            bottom: { style: 'thin', color: { argb: 'FFCBD5E1' } },
                                            right: { style: 'thin', color: { argb: 'FFCBD5E1' } }
                                        };
                                    });
                                }
                            });

                            const buffer = await workbook.xlsx.writeBuffer();
                            const blob = new Blob([buffer], {
                                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                            });

                            const url = URL.createObjectURL(blob);
                            const a = document.createElement('a');
                            a.href = url;
                            a.download = 'data-klien.xlsx';
                            a.click();
                            URL.revokeObjectURL(url);
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Download PDF',
                        className: 'buttons-pdf',
                        title: '',
                        filename: 'data-klien',
                        pageSize: 'A4',
                        orientation: 'landscape',
                        exportOptions: {
                            columns: [0, 1, 2],
                            format: {
                                body: cleanExport
                            }
                        },
                        customize: function (doc) {
                            doc.pageSize = 'A4';
                            doc.pageOrientation = 'landscape';
                            doc.pageMargins = [35, 90, 35, 45];

                            doc.defaultStyle = {
                                font: 'Roboto',
                                fontSize: 9,
                                color: '#334155'
                            };

                            const tableNode = doc.content.find(item => item.table);

                            if (tableNode) {
                                const body = tableNode.table.body;

                                body[0].unshift({
                                    text: 'No.',
                                    style: 'tableHeader',
                                    alignment: 'center'
                                });

                                for (let i = 1; i < body.length; i++) {
                                    body[i].unshift({
                                        text: String(i),
                                        alignment: 'center'
                                    });
                                }

                                tableNode.table.headerRows = 1;
                                tableNode.table.widths = [30, '*', '*', 90];

                                tableNode.layout = {
                                    hLineWidth: () => 0.5,
                                    vLineWidth: () => 0.5,
                                    hLineColor: () => '#CBD5E1',
                                    vLineColor: () => '#CBD5E1',
                                    paddingLeft: () => 8,
                                    paddingRight: () => 8,
                                    paddingTop: () => 7,
                                    paddingBottom: () => 7,
                                    fillColor: rowIndex =>
                                        rowIndex === 0
                                            ? '#334155'
                                            : rowIndex % 2 === 0
                                                ? '#F8FAFC'
                                                : null
                                };
                            }

                            doc.content.unshift({
                                columns: [
                                    logoBase64
                                        ? {
                                            image: logoBase64,
                                            width: 65,
                                            margin: [0, 0, 12, 0]
                                        }
                                        : { text: '', width: 65 },
                                    {
                                        stack: [
                                            {
                                                text: 'DATA KLIEN',
                                                fontSize: 16,
                                                bold: true,
                                                color: '#1E293B'
                                            },
                                            {
                                                text: 'Laporan data klien yang terdaftar dalam sistem',
                                                fontSize: 9,
                                                color: '#64748B',
                                                margin: [0, 5, 0, 0]
                                            },
                                            {
                                                text: 'Tanggal cetak: ' +
                                                    new Intl.DateTimeFormat('id-ID', {
                                                        day: '2-digit',
                                                        month: 'long',
                                                        year: 'numeric'
                                                    }).format(new Date()),
                                                fontSize: 8,
                                                color: '#64748B',
                                                margin: [0, 4, 0, 0]
                                            }
                                        ]
                                    }
                                ],
                                columnGap: 10,
                                margin: [0, 0, 0, 20]
                            });
                        }
                    }
                ]
            }
        }
    });
});
</script>


</x-app-layout>