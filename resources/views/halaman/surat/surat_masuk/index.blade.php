@extends('templates.default')

@section('title')
<div>
    <a href="{{route('surat')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Mangelola Surat Masuk</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <form class="form-inline float-left">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari">
            <a type="button"><i class="fas fa-search"></i></a>
        </form>
        <a href="{{route('tambah.surat-masuk')}}" class="btn btn-success float-right"><i
                class="fas fa-plus"></i>    <b>Tambah</b></a>
    </div>
    <div class="card-body">
        <div class="badge badge-primary pull-left" style="margin-bottom: 20px">Total Data :
            {{ $surat_masuk->total()}}</div>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                    @foreach ($surat_masuk as $item)
                    <?php $no++;?>
                    <tr>
                        <td class="text-center">{{ $no }}</td>
                        <td>{{ $item->no_agenda }}</td>
                        <td>{{ $item->tgl_diterima }}</td>
                        <td>{{ $item->instansi->nama }}</td>
                        <td>{{ $item->no_surat }}</td>
                        <td>{{ $item->tgl_surat }}</td>
                        <td>{{ $item->perihal }}</td>
                        <td>
                            <a href="{{ url('storage/arsip'.'/'.$item->file) }}" target="_blank">
                                Lihat Dokumen</a>
                        </td>
                        <td class="text-center">
                            <form action="{{route('hapus.surat-masuk', $item->id)}}" method="post"
                                onsubmit="return confirm('Yakin Hapus Data?')">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('edit.surat-masuk', $item->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm"><i
                                        class="fas fa-trash-alt"></i></button>
                                <a href="{{route('tambah.disposisi')}}" class="btn btn-info btn-sm"><i class="fas fa-arrow-right"></i>    <b>Disposisi</b></a>
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
            {{ $surat_masuk->links()}}
        </div>
    </div>
</div>
@endsection