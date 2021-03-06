<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS Files -->
    <link href="{{asset('assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
    <!-- FONT ICON -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fontawesome-free/css/all.min.css')}}">
</head>

<body>
    <h2 align="center"><b>Laporan Surat Masuk</b></h2>
    <br>
    <center>
        <a href="/cetak-pdf-surat-masuk" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-print"></i> <b>Unduh PDF</b></a>
        <a href="/cetak-excel-surat-masuk" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-print"></i> <b>Unduh Excel</b></a>
    </center>

    <br>
    <table class='table table-bordered'>
        <table  align="center"  border="1px" style="width: 95%">
            <thead class="text-center thead-light">
                <tr>
                    <th>
                        No.
                    </th>
                    <th>
                        No. Agenda
                    </th>
                    <th>
                        Tanggal Diterima
                    </th>
                    <th>
                        Instansi
                    </th>
                    <th>
                        No. Surat
                    </th>
                    <th>
                        Tanggal Surat
                    </th>
                    <th>
                        Perihal
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;?>
                @foreach ($surat_masuk as $item)
                <?php $no++;?>
                <tr>
                    <td style="text-align: center">{{ $no }}</td>
                    <td>{{ $item->no_agenda }}</td>
                    <td style="text-align: center">{{ $item->tgl_diterima }}</td>
                    <td>{{ $item->instansi->nama }}</td>
                    <td>{{ $item->no_surat }}</td>
                    <td style="text-align: center">{{ $item->tgl_surat }}</td>
                    <td>{{ $item->perihal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>

</html>