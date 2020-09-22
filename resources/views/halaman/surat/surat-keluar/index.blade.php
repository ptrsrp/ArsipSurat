@extends('templates.default')

@section('title')
<div>
    <a href="{{route('surat')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Mangelola Surat Keluar</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <form class="form-inline float-left">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari">
            <a type="button"><i class="fas fa-search"></i></a>
        </form>
        <a href="{{route('tambah.surat-keluar')}}" class="btn btn-success float-right"><i
                class="fas fa-plus"></i>    <b>Tambah</b></a>
    </div>
    <div class="card-body">
        <div class="badge badge-primary pull-left" style="margin-bottom: 20px">Total Data :
            {{ $surat_keluar->total()}}</div>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                        <th>
                            File
                        </th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;?>
                    @foreach ($surat_keluar as $item)
                    <?php $no++;?>
                    <tr>
                        <td class="text-center">{{ $no }}</td>
                        <td>{{ $item->tgl_kirim }}</td>
                        <td>{{ $item->instansi->nama }}</td>
                        <td>{{ $item->no_surat }}</td>
                        <td>{{ $item->perihal }}</td>
                        <td>
                            <a href="{{ url('storage/arsip/surat-keluar'.'/'.$item->file) }}" target="_blank">
                                Lihat Dokumen</a>
                        </td>
                        <td class="text-center">
                            <form action="{{route('hapus.surat-keluar', $item->id)}}" method="post"
                                onsubmit="return confirm('Yakin Hapus Data?')">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('edit.surat-keluar', $item->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="pagination justify-content-end">
            {{ $surat_keluar->links()}}
        </div>
    </div>
</div>
@endsection