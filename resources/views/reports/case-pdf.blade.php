<!DOCTYPE html> <html lang="id"> <head> <meta charset="UTF-8">
<title>
    Laporan Perkara {{ $case->nomor_perkara ?? 'perkara' }}
</title>

<style>

    * {
        box-sizing: border-box;
    }

    @page {
        size: A4;
        margin: 10mm;
    }

    body {
        margin: 0;
        padding: 30px;
        background: #f3f4f6;
        font-family: Arial, Helvetica, sans-serif;
        color: #111827;
    }

    .pdf-page {
        width: 794px;
        margin: 0 auto;
        padding: 40px;
        background: #ffffff;
    }

    /* =====================================================
       KOP SURAT
    ===================================================== */

    .letterhead {
        width: 100%;
        display: table;
        table-layout: fixed;
        min-height: 75px;
    }

    .letterhead-logo {
        display: table-cell;
        width: 90px;
        vertical-align: middle;
        text-align: left;
    }

    .letterhead-logo img {
        max-width: 70px;
        max-height: 65px;
        width: auto;
        height: auto;
        object-fit: contain;
    }

    .letterhead-info {
        display: table-cell;
        vertical-align: middle;
    }

    .firm-name {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
        color: #111827;
        letter-spacing: 0.3px;
    }

    .firm-subtitle {
        margin-top: 3px;
        font-size: 10px;
        color: #374151;
    }

    .firm-contact {
        margin-top: 5px;
        font-size: 8.5px;
        line-height: 1.5;
        color: #6b7280;
    }

    .letterhead-line {
        margin-top: 12px;
        margin-bottom: 25px;
        border-bottom: 2px solid #111827;
    }


    /* =====================================================
       REPORT HEADER
    ===================================================== */

    .header {
        text-align: center;
        margin-bottom: 30px;
    }

    .header h1 {
        margin: 0;
        font-size: 22px;
        font-weight: bold;
        letter-spacing: 0.5px;
        color: #111827;
    }

    .header p {
        margin-top: 7px;
        margin-bottom: 0;
        color: #6b7280;
        font-size: 11px;
    }


    /* =====================================================
       SECTION
    ===================================================== */

    .section {
        margin-top: 25px;
    }

    .section:first-of-type {
        margin-top: 0;
    }

    .section-title {
        font-size: 15px;
        font-weight: bold;
        margin-bottom: 10px;
        border-bottom: 2px solid #111827;
        padding-bottom: 6px;
        color: #111827;
    }


    /* =====================================================
       TABLE
    ===================================================== */

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    th,
    td {
        border: 1px solid #d1d5db;
        padding: 7px;
        text-align: left;
        font-size: 10px;
        vertical-align: top;

        /*
         * Jangan biarkan teks panjang
         * keluar dari tabel.
         */
        word-wrap: break-word;
        overflow-wrap: anywhere;
        word-break: break-word;

        line-height: 1.45;
    }

    th {
        background: #f3f4f6;
        font-weight: bold;
        color: #111827;
    }

    .label {
        width: 30%;
        font-weight: bold;
        background: #f9fafb;
        color: #374151;
    }

    .empty {
        text-align: center;
        color: #6b7280;
        padding: 12px;
    }

    .status {
        font-weight: bold;
    }


    /* =====================================================
       HASIL PERSIDANGAN
    ===================================================== */

    .hearing-result {
        white-space: normal;
        overflow-wrap: anywhere;
        word-break: break-word;
        line-height: 1.5;
    }


    /* =====================================================
       FOOTER
    ===================================================== */

    .footer {
        margin-top: 35px;
        padding-top: 10px;
        border-top: 1px solid #e5e7eb;
        text-align: right;
        font-size: 9px;
        color: #6b7280;

        /*
         * Pastikan footer tidak ikut
         * terseret oleh tabel.
         */
        clear: both;
        width: 100%;
    }


    /* =====================================================
       PAGE BREAK
    ===================================================== */

    .avoid-break {
        page-break-inside: avoid;
    }

    tr {
        page-break-inside: avoid;
    }

    thead {
        display: table-header-group;
    }


    /* =====================================================
       PRINT
    ===================================================== */

    @media print {

        body {
            padding: 0;
            background: #ffffff;
        }

        .pdf-page {
            width: 100%;
            min-height: auto;
            margin: 0;
            padding: 20px;
        }

        .footer {
            page-break-inside: avoid;
        }

    }

</style>

</head> <body> <div class="pdf-page" id="pdf-content">
{{-- =====================================================
     KOP SURAT
===================================================== --}}

<div class="letterhead">

    <div class="letterhead-logo">

        <img
            src="{{ asset('images/logo.png') }}"
            alt="Logo Law Firm"
        >

    </div>


    <div class="letterhead-info">

        <div class="firm-name">
            ODS Law Firm
        </div>

        <div class="firm-subtitle">
            Advocates & Legal Consultants
        </div>

        <div class="firm-contact">

            Jl. Marsekal Suryadarma, RT.001/RW.010,
            Pajang, Kec. Neglasari, Kota Tangerang,
            Banten 15129

            <br>

            Telp. +62 822-2316-1987
            &nbsp; | &nbsp;
            Email: lawfirmods@gmail.com

        </div>

    </div>

</div>


{{-- GARIS KOP --}}

<div class="letterhead-line"></div>


{{-- =====================================================
     HEADER LAPORAN
===================================================== --}}

<div class="header">

    <h1>
        LAPORAN PERKARA
    </h1>

</div>


{{-- =====================================================
     INFORMASI PERKARA
===================================================== --}}

<div class="section avoid-break">

    <div class="section-title">
        Informasi Perkara
    </div>


    <table>

        <tbody>

            <tr>

                <td class="label">
                    Nomor Perkara
                </td>

                <td>
                    {{ $case->nomor_perkara ?? '-' }}
                </td>

            </tr>


            <tr>

                <td class="label">
                    Judul Perkara
                </td>

                <td>
                    {{ $case->judul_perkara ?? '-' }}
                </td>

            </tr>


            <tr>

                <td class="label">
                    Status Perkara
                </td>

                <td class="status">
                    {{ $case->status ?? '-' }}
                </td>

            </tr>


            <tr>

                <td class="label">
                    Klien
                </td>

                <td>
                    {{ $case->client->nama ?? '-' }}
                </td>

            </tr>


            <tr>

                <td class="label">
                    Lawyer
                </td>

                <td>
                    {{ $case->lawyer->nama ?? '-' }}
                </td>

            </tr>

        </tbody>

    </table>

</div>


{{-- =====================================================
     DOKUMEN
===================================================== --}}

<div class="section">

    <div class="section-title">
        Dokumen
    </div>


    <table>

        <thead>

            <tr>

                <th style="width: 50px;">
                    No.
                </th>

                <th>
                    Nama Dokumen
                </th>

            </tr>

        </thead>


        <tbody>

            @forelse($case->documents as $index => $document)

                <tr>

                    <td>
                        {{ $index + 1 }}
                    </td>

                    <td>
                        {{ $document->nama_dokumen ?? '-' }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="2" class="empty">
                        Belum ada dokumen.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


{{-- =====================================================
     AGENDA SIDANG
===================================================== --}}

<div class="section">

    <div class="section-title">
        Agenda Sidang
    </div>


    <table>

        <thead>

            <tr>

                <th style="width: 13%;">
                    Tanggal
                </th>

                <th style="width: 10%;">
                    Jam
                </th>

                <th style="width: 17%;">
                    Tempat
                </th>

                <th style="width: 19%;">
                    Agenda
                </th>

                <th style="width: 12%;">
                    Status
                </th>

                <th style="width: 29%;">
                    Hasil Persidangan
                </th>

            </tr>

        </thead>


        <tbody>

            @forelse($case->hearings as $hearing)

                <tr>

                    <td>
                        {{ $hearing->tanggal_sidang ?? '-' }}
                    </td>


                    <td>
                        {{ $hearing->jam ?? '-' }}
                    </td>


                    <td>
                        {{ $hearing->tempat ?? '-' }}
                    </td>


                    <td>
                        {{ $hearing->agenda ?? '-' }}
                    </td>


                    <td>
                        {{ $hearing->status ?? '-' }}
                    </td>


                    <td class="hearing-result">
                    @if(filled($hearing->hasil_persidangan))
                        {!! nl2br(e($hearing->hasil_persidangan)) !!}
                    @else
                        <span style="color: #6b7280;">-</span>
                    @endif
                </td>


                </tr>

            @empty

                <tr>

                    <td colspan="6" class="empty">
                        Belum ada agenda sidang.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


{{-- =====================================================
     FOOTER
===================================================== --}}

<div class="footer">

    Dicetak dari sistem manajemen perkara

</div>

</div>

{{-- =========================================================
HTML2PDF
========================================================== --}}

<script src="{{ asset('js/html2pdf.bundle.min.js') }}"></script> <script> window.onload = function () { const element = document.getElementById('pdf-content'); const nomorPerkara = @json( $case->nomor_perkara ?? 'perkara' ); /* * Bersihkan karakter yang tidak cocok * untuk nama file. */ const safeNomorPerkara = nomorPerkara .toString() .replace(/[\/\\:*?"<>|]/g, '-') .replace(/\s+/g, '-'); const opt = { margin: 10, filename: 'laporan-perkara-' + safeNomorPerkara + '.pdf', image: { type: 'jpeg', quality: 0.98 }, html2canvas: { scale: 2, useCORS: true, allowTaint: false, backgroundColor: '#ffffff' }, jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }, pagebreak: { mode: [ 'css', 'legacy' ] } }; html2pdf() .set(opt) .from(element) .save() .then(function () { setTimeout(function () { window.history.back(); }, 500); }) .catch(function (error) { console.error( 'Gagal membuat PDF:', error ); }); }; </script> </body> </html>