<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Data User</h2>
            <p class="mt-1 text-sm text-slate-500">
                Kelola pengguna dan hak akses yang terdaftar dalam sistem.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col sm:flex-row sm:items-center
                        sm:justify-between gap-4 mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-slate-800">
                        Daftar User
                    </h3>
                    <p class="text-sm text-slate-500 mt-1">
                        Informasi pengguna dan role yang dimiliki.
                    </p>
                </div>

                <a href="{{ route('users.create') }}"
                   class="inline-flex items-center gap-2 bg-blue-600
                          hover:bg-blue-700 text-white px-4 py-2.5
                          rounded-lg text-sm font-semibold">
                    + Tambah User
                </a>
            </div>

            @if(session('success'))
                <div class="mb-6 rounded-lg border border-emerald-200
                            bg-emerald-50 px-4 py-3 text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white border border-slate-200 rounded-xl shadow-sm">
                <div class="px-6 py-4 border-b border-slate-200">
                    <h3 class="font-semibold text-slate-800">
                        Tabel Pengguna
                    </h3>
                    <p class="mt-1 text-sm text-slate-500">
                        Cari, urutkan, dan download data pengguna.
                    </p>
                </div>

                <div class="p-4 sm:p-6 overflow-x-auto">
                    <table id="usersTable" class="w-full min-w-[750px]">
                        <thead>
                            <tr>
                                <th class="text-left">User</th>
                                <th class="text-left">Email</th>
                                <th class="text-left">Role</th>
                                <th class="text-left">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full
                                                        bg-blue-100 text-blue-700
                                                        flex items-center justify-center
                                                        font-bold flex-shrink-0">
                                                {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="user-name font-semibold text-slate-800">
                                                    {{ $user->name }}
                                                </p>
                                                <p class="text-xs text-slate-400">
                                                    User Sistem
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>{{ $user->email ?: '-' }}</td>

                                    <td>
                                        @php
                                            $roleColors = [
                                                'admin' => 'bg-purple-50 text-purple-700',
                                                'lawyer' => 'bg-blue-50 text-blue-700',
                                                'staff' => 'bg-emerald-50 text-emerald-700',
                                            ];

                                            $roleClass = $roleColors[$user->role]
                                                ?? 'bg-slate-100 text-slate-600';
                                        @endphp

                                        <span class="inline-flex items-center px-2.5 py-1
                                                     rounded-md text-xs font-semibold
                                                     {{ $roleClass }}">
                                            {{ ucfirst($user->role ?: '-') }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('users.edit', $user->id) }}"
                                               class="px-3 py-1.5 rounded-lg bg-amber-50
                                                      text-amber-700 hover:bg-amber-100
                                                      text-xs font-semibold">
                                                Edit
                                            </a>

                                            <form action="{{ route('users.destroy', $user->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Hapus user ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="px-3 py-1.5 rounded-lg bg-red-50
                                                               text-red-700 hover:bg-red-100
                                                               text-xs font-semibold">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <h4 class="font-semibold text-slate-700">
                                            Belum Ada User
                                        </h4>
                                        <p class="text-sm text-slate-400 mt-1">
                                            Belum ada pengguna yang terdaftar dalam sistem.
                                        </p>
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
        #usersTable_wrapper {
            color: #475569;
            font-size: 14px;
        }

        #usersTable_wrapper .dt-search input,
        #usersTable_wrapper .dt-length select {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 7px 10px;
            background: white;
        }

        #usersTable_wrapper .dt-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 16px;
        }

        #usersTable_wrapper .dt-buttons .dt-button {
            border: none !important;
            border-radius: 8px !important;
            padding: 9px 14px !important;
            color: white !important;
            font-weight: 600 !important;
            cursor: pointer;
            margin: 0 !important;
        }

        #usersTable_wrapper .buttons-pdf {
            background: #dc2626 !important;
        }

        #usersTable_wrapper .buttons-pdf:hover {
            background: #b91c1c !important;
        }

        #usersTable_wrapper .buttons-excel {
            background: #15803d !important;
        }

        #usersTable_wrapper .buttons-excel:hover {
            background: #166534 !important;
        }

        #usersTable thead th {
            background: #f8fafc;
        }
    </style>

{{-- Dependencies --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="{{ asset('js/exceljs.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script>
        $(function () {
            const selector = '#usersTable';
            const table = document.querySelector(selector);

            if (!table) return;

            // Pertahankan perilaku halaman ketika belum ada data.
            if (table.querySelector('tbody td[colspan]')) return;

            if (DataTable.isDataTable(selector)) return;

            /*
             * Logo dibaca dari public/images/logo.png oleh Laravel.
             * PHP mengubah file gambar menjadi Base64 agar bisa
             * disematkan langsung ke dokumen PDF.
             */
            const logoBase64 = @json(
                file_exists(public_path('images/logo.png'))
                    ? 'data:image/png;base64,' .
                        base64_encode(file_get_contents(public_path('images/logo.png')))
                    : null
            );

            function cleanExport(data, row, column, node) {
                if (column === 0) {
                    const name = node.querySelector('.user-name');
                    return name ? name.textContent.trim() : '';
                }

                return node.textContent.replace(/\s+/g, ' ').trim();
            }

            function formatDate(date) {
                return new Intl.DateTimeFormat('id-ID', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                }).format(date);
            }

            new DataTable(selector, {
                pageLength: 10,
                order: [],

                layout: {
                    topStart: {
                        buttons: [
                            {
                                extend: 'pdfHtml5',
                                text: 'Download PDF',
                                title: '',
                                filename: 'data-user',

                                exportOptions: {
                                    columns: [0, 1, 2],
                                    format: {
                                        body: cleanExport
                                    }
                                },

                                customize: function (doc) {
                                    const now = new Date();

                                    doc.pageSize = 'A4';
                                    doc.pageOrientation = 'landscape';
                                    doc.pageMargins = [35, 95, 35, 55];

                                    doc.defaultStyle = {
                                        font: 'Roboto',
                                        fontSize: 9,
                                        color: '#334155'
                                    };

                                    /*
                                     * Cari tabel ekspor yang dibuat DataTables.
                                     */
                                    const tableNode = doc.content.find(
                                        item => item.table
                                    );

                                    if (tableNode) {
                                        const body = tableNode.table.body;

                                        /*
                                         * Tambahkan nomor urut di kolom pertama.
                                         */
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
                                        tableNode.table.widths = [
                                            30, '*', '*', 75
                                        ];

                                        tableNode.layout = {
                                            hLineWidth: function () {
                                                return 0.5;
                                            },
                                            vLineWidth: function () {
                                                return 0.5;
                                            },
                                            hLineColor: function () {
                                                return '#CBD5E1';
                                            },
                                            vLineColor: function () {
                                                return '#CBD5E1';
                                            },
                                            paddingLeft: function () {
                                                return 8;
                                            },
                                            paddingRight: function () {
                                                return 8;
                                            },
                                            paddingTop: function () {
                                                return 7;
                                            },
                                            paddingBottom: function () {
                                                return 7;
                                            },
                                            fillColor: function (rowIndex) {
                                                if (rowIndex === 0) {
                                                    return '#334155';
                                                }

                                                return rowIndex % 2 === 0
                                                    ? '#F8FAFC'
                                                    : null;
                                            }
                                        };

                                        /*
                                         * Ulangi header tabel jika dokumen
                                         * terdiri dari beberapa halaman.
                                         */
                                        tableNode.table.headerRows = 1;

                                        tableNode.margin = [0, 0, 0, 0];
                                    }

                                    /*
                                     * Header halaman:
                                     * logo di kiri, judul tepat di tengah.
                                     */
                                    doc.header = function () {
                                        const headerColumns = [
                                            {
                                                width: 65,
                                                stack: logoBase64
                                                    ? [{
                                                        image: logoBase64,
                                                        fit: [55, 55],
                                                        alignment: 'left'
                                                    }]
                                                    : [{
                                                        text: '',
                                                        fontSize: 1
                                                    }],
                                                margin: [0, 0, 0, 0]
                                            },
                                            {
                                                width: '*',
                                                stack: [
                                                    {
                                                        text: 'SISTEM INFORMASI HUKUM',
                                                        fontSize: 15,
                                                        bold: true,
                                                        color: '#0F172A',
                                                        alignment: 'center',
                                                        margin: [0, 10, 0, 4]
                                                    },
                                                    {
                                                        text: 'LAPORAN DATA USER',
                                                        fontSize: 11,
                                                        bold: true,
                                                        color: '#334155',
                                                        alignment: 'center',
                                                        margin: [0, 0, 0, 3]
                                                    },
                                                    {
                                                        text: 'Tanggal cetak: ' + formatDate(now),
                                                        fontSize: 8,
                                                        color: '#64748B',
                                                        alignment: 'center'
                                                    }
                                                ]
                                            },
                                            {
                                                width: 65,
                                                text: '',
                                                margin: [0, 0, 0, 0]
                                            }
                                        ];

                                        return {
                                            margin: [35, 20, 35, 0],
                                            table: {
                                                widths: [65, '*', 65],
                                                body: [headerColumns]
                                            },
                                            layout: {
                                                hLineWidth: function () {
                                                    return 0;
                                                },
                                                vLineWidth: function () {
                                                    return 0;
                                                },
                                                paddingLeft: function () {
                                                    return 0;
                                                },
                                                paddingRight: function () {
                                                    return 0;
                                                },
                                                paddingTop: function () {
                                                    return 0;
                                                },
                                                paddingBottom: function () {
                                                    return 0;
                                                }
                                            }
                                        };
                                    };

                                    /*
                                     * Hilangkan judul bawaan DataTables.
                                     */
                                    doc.content = doc.content.filter(function (item) {
                                        return !(item.text === 'Data User');
                                    });

                                    doc.styles.tableHeader = {
                                        bold: true,
                                        fontSize: 9,
                                        color: '#FFFFFF',
                                        fillColor: '#334155',
                                        alignment: 'left',
                                        margin: [0, 2, 0, 2]
                                    };

                                    doc.styles.tableBodyEven = {
                                        fontSize: 9,
                                        color: '#334155'
                                    };

                                    doc.styles.tableBodyOdd = {
                                        fontSize: 9,
                                        color: '#334155'
                                    };

                                    /*
                                     * Footer halaman dan jumlah halaman.
                                     */
                                    doc.footer = function (currentPage, pageCount) {
                                        return {
                                            margin: [35, 15, 35, 0],
                                            columns: [
                                                {
                                                    text: 'Laporan Data User',
                                                    alignment: 'left',
                                                    fontSize: 8,
                                                    color: '#64748B'
                                                },
                                                {
                                                    text: 'Halaman ' + currentPage +
                                                        ' dari ' + pageCount,
                                                    alignment: 'right',
                                                    fontSize: 8,
                                                    color: '#64748B'
                                                }
                                            ]
                                        };
                                    };
                                }
                            },

                            {
                                text: 'Download Excel',
                                className: 'buttons-excel',
                                action: async function (e, dt) {
                                    try {
                                        const workbook = new ExcelJS.Workbook();
                                        workbook.creator = 'Sistem Informasi Hukum';
                                        workbook.created = new Date();

                                        const worksheet = workbook.addWorksheet('Data User');

                                        worksheet.columns = [
                                            { key: 'no', width: 8 },
                                            { key: 'nama', width: 30 },
                                            { key: 'email', width: 36 },
                                            { key: 'role', width: 18 }
                                        ];

                                        // Ambil logo dari public/images/logo.png.
                                        const logoResponse = await fetch(@json(asset('images/logo.png')));
                                        if (!logoResponse.ok) {
                                            throw new Error('Logo tidak ditemukan di public/images/logo.png');
                                        }

                                        const logoBlob = await logoResponse.blob();
                                        const logoDataUrl = await new Promise((resolve, reject) => {
                                            const reader = new FileReader();
                                            reader.onload = () => resolve(reader.result);
                                            reader.onerror = reject;
                                            reader.readAsDataURL(logoBlob);
                                        });

                                        const logoBase64Excel = String(logoDataUrl).split(',')[1];
                                        const logoId = workbook.addImage({
                                            base64: logoBase64Excel,
                                            extension: 'png'
                                        });

                                        // Ruang untuk logo dan judul laporan.
                                        worksheet.getRow(1).height = 22;
                                        worksheet.getRow(2).height = 24;
                                        worksheet.getRow(3).height = 22;
                                        worksheet.getRow(4).height = 8;

                                        worksheet.addImage(logoId, {
                                            tl: { col: 0, row: 0 },
                                            ext: { width: 95, height: 65 }
                                        });

                                        worksheet.mergeCells('B2:D2');
                                        worksheet.getCell('B2').value = 'SISTEM INFORMASI HUKUM';
                                        worksheet.getCell('B2').font = {
                                            name: 'Arial', size: 16, bold: true,
                                            color: { argb: 'FF0F172A' }
                                        };
                                        worksheet.getCell('B2').alignment = {
                                            horizontal: 'center', vertical: 'middle'
                                        };

                                        worksheet.mergeCells('B3:D3');
                                        worksheet.getCell('B3').value = 'LAPORAN DATA USER';
                                        worksheet.getCell('B3').font = {
                                            name: 'Arial', size: 11, bold: true,
                                            color: { argb: 'FF334155' }
                                        };
                                        worksheet.getCell('B3').alignment = {
                                            horizontal: 'center', vertical: 'middle'
                                        };

                                        worksheet.mergeCells('A5:D5');
                                        worksheet.getCell('A5').value = 'Tanggal cetak: ' + formatDate(new Date());
                                        worksheet.getCell('A5').font = {
                                            name: 'Arial', size: 9,
                                            color: { argb: 'FF64748B' }
                                        };

                                        // Header tabel Excel.
                                        const headerRow = worksheet.getRow(7);
                                        headerRow.values = ['No.', 'User', 'Email', 'Role'];
                                        headerRow.height = 25;
                                        headerRow.eachCell((cell) => {
                                            cell.font = {
                                                name: 'Arial', size: 10, bold: true,
                                                color: { argb: 'FFFFFFFF' }
                                            };
                                            cell.fill = {
                                                type: 'pattern', pattern: 'solid',
                                                fgColor: { argb: 'FF334155' }
                                            };
                                            cell.alignment = {
                                                horizontal: 'center', vertical: 'middle'
                                            };
                                            cell.border = {
                                                top: { style: 'thin', color: { argb: 'FFCBD5E1' } },
                                                left: { style: 'thin', color: { argb: 'FFCBD5E1' } },
                                                bottom: { style: 'thin', color: { argb: 'FFCBD5E1' } },
                                                right: { style: 'thin', color: { argb: 'FFCBD5E1' } }
                                            };
                                        });

                                        // Ekspor seluruh data hasil pencarian/filter, bukan hanya halaman aktif.
                                        const rows = dt.rows({ search: 'applied', order: 'applied' }).nodes().toArray();

                                        rows.forEach((tr, index) => {
                                            const cells = tr.querySelectorAll('td');
                                            const nameElement = cells[0]?.querySelector('.user-name');
                                            const name = nameElement
                                                ? nameElement.textContent.trim()
                                                : cleanExport('', tr, 0, cells[0]);
                                            const email = cells[1]
                                                ? cells[1].textContent.replace(/\s+/g, ' ').trim()
                                                : '';
                                            const role = cells[2]
                                                ? cells[2].textContent.replace(/\s+/g, ' ').trim()
                                                : '';

                                            const excelRow = worksheet.addRow([index + 1, name, email, role]);
                                            excelRow.height = 22;
                                            excelRow.eachCell((cell, colNumber) => {
                                                cell.font = { name: 'Arial', size: 10, color: { argb: 'FF334155' } };
                                                cell.alignment = {
                                                    vertical: 'middle',
                                                    horizontal: colNumber === 1 ? 'center' : 'left',
                                                    wrapText: true
                                                };
                                                cell.border = {
                                                    top: { style: 'thin', color: { argb: 'FFE2E8F0' } },
                                                    left: { style: 'thin', color: { argb: 'FFE2E8F0' } },
                                                    bottom: { style: 'thin', color: { argb: 'FFE2E8F0' } },
                                                    right: { style: 'thin', color: { argb: 'FFE2E8F0' } }
                                                };
                                                if (index % 2 === 1) {
                                                    cell.fill = {
                                                        type: 'pattern', pattern: 'solid',
                                                        fgColor: { argb: 'FFF8FAFC' }
                                                    };
                                                }
                                            });
                                        });

                                        worksheet.views = [{ state: 'frozen', ySplit: 7 }];
                                        worksheet.autoFilter = {
                                            from: { row: 7, column: 1 },
                                            to: { row: 7 + rows.length, column: 4 }
                                        };

                                        const buffer = await workbook.xlsx.writeBuffer();
                                        const blob = new Blob([buffer], {
                                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                                        });
                                        const url = URL.createObjectURL(blob);
                                        const link = document.createElement('a');
                                        link.href = url;
                                        link.download = 'data-user.xlsx';
                                        document.body.appendChild(link);
                                        link.click();
                                        link.remove();
                                        setTimeout(() => URL.revokeObjectURL(url), 1000);
                                    } catch (error) {
                                        console.error('Gagal export Excel:', error);
                                        alert('Gagal membuat file Excel. Pastikan koneksi internet aktif dan file logo tersedia di public/images/logo.png.');
                                    }
                                }
                            }
                        ]
                    },

                    language: {
                        search: 'Cari:',
                        searchPlaceholder: 'Nama atau email...',
                        lengthMenu: 'Tampilkan _MENU_ data',
                        info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ user',
                        infoEmpty: 'Tidak ada data user',
                        infoFiltered: '(difilter dari _MAX_ total user)',
                        zeroRecords: 'User tidak ditemukan',
                        emptyTable: 'Belum ada pengguna yang terdaftar.',
                        paginate: {
                            first: 'Pertama',
                            last: 'Terakhir',
                            next: 'Berikutnya',
                            previous: 'Sebelumnya'
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
