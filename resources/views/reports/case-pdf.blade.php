<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        table {
            width:100%;
            border-collapse: collapse;
        }

        td, th {
            border:1px solid #000;
            padding:5px;
        }

        h2 {
            text-align:center;
        }
    </style>

</head>

<body>

<h2>
LAPORAN PERKARA
</h2>


<table>

<tr>
<td width="30%">Nomor Perkara</td>
<td>
{{ $case->nomor_perkara ?? '-' }}
</td>
</tr>


<tr>
<td>Judul Perkara</td>
<td>
{{ $case->judul_perkara ?? '-' }}
</td>
</tr>


<tr>
<td>Status</td>
<td>
{{ $case->status ?? '-' }}
</td>
</tr>


<tr>
<td>Klien</td>
<td>
{{ $case->client->nama ?? '-' }}
</td>
</tr>


<tr>
<td>Pengacara</td>
<td>
{{ $case->lawyer->nama ?? '-' }}
</td>
</tr>


</table>



<h3>Dokumen</h3>


<table>

<tr>
<th>Nama Dokumen</th>
</tr>


@foreach($case->documents as $doc)

<tr>

<td>
{{ $doc->nama_dokumen ?? '-' }}
</td>

</tr>

@endforeach


</table>




<h3>Sidang</h3>


<table>

<tr>
<th>Tanggal</th>
<th>Tempat</th>
<th>Agenda</th>
</tr>


@foreach($case->hearings as $h)

<tr>

<td>
{{ $h->tanggal ?? '-' }}
</td>


<td>
{{ $h->tempat ?? '-' }}
</td>


<td>
{{ $h->agenda ?? '-' }}
</td>


</tr>


@endforeach


</table>


</body>
</html>