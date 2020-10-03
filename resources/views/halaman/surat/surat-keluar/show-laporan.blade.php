<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS Files -->
    <link href="{{asset('assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
</head>

<body>
    <h2 align="center"><b>Laporan Surat Keluar</b></h2>
    <br>
    <center>
        <a href="/cetak-pdf-surat-keluar" class="btn btn-primary btn-sm" target="_blank"> <b>Cetak PDF</b></a>
        <a href="/cetak-excel-surat-keluar" class="btn btn-primary btn-sm" target="_blank"> <b>Cetak Excel</b></a>
    </center>

    <br>
    <table class='table table-bordered'>
        <table align="center" border="1px" style="width: 95%">
            <thead class="text-center thead-light">
                <tr>
                    <th>
                        No.
                    </th>
                    <th>
                        Tanggal Kirim
                    </th>
                    <th>
                        Penerima
                    </th>
                    <th>
                        No. Surat
                    </th>
                    <th>
                        Perihal
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;?>
                @foreach ($surat_keluar as $item)
                <?php $no++;?>
                <tr>
                    <td style="text-align: center">{{ $no }}</td>
                    <td>{{ $item->tgl_kirim }}</td>
                    <td>{{ $item->instansi->nama }}</td>
                    <td>{{ $item->no_surat }}</td>
                    <td>{{ $item->perihal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>

</html>