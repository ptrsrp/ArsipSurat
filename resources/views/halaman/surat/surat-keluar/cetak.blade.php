<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <br>
    <h2 align="center"><b>Laporan Surat Keluar</b></h2>
    <h3 align="center"><b>Kantor Pos Pati</b></h3>
    <hr>
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