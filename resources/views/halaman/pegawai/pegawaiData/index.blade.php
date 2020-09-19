@extends('templates.default')

@section('title')
<div>
    <a href="{{route('pegawai')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Mangelola Pegawai</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <form class="form-inline float-left">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari">
            <a type="button"><i class="fa fa-search"></i></a>
        </form>
        <a href="{{ route('tambah.pegawai')}}" class="btn btn-success btn-md float-right"><i class="fa fa-user-plus"></i></a>
    </div>
    <div class="card-body">
        <div class="badge badge-primary pull-left" style="margin-bottom: 20px">Total Data : {{ $pegawai->total()}}</div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="text-center thead-light">
                    <tr>
                        <th>
                            No.
                        </th>
                        <th>
                            NIPPOS
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Bagian
                        </th>
                        <th>
                            Jabatan
                        </th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;?>
                    @foreach ($pegawai as $item)
                    <?php $no++;?>
                    <tr>
                        <td class="text-center">{{ $no }}</td>
                        <td>{{ $item->nippos }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->bagian->nama }}</td>
                        <td>{{ $item->jabatan->nama }}</td>
                        <td class="text-center">
                            <form action="{{ route('hapus.pegawai', $item->nippos) }}" method="post"
                                onsubmit="return confirm('Yakin Hapus Data?')">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('edit.pegawai', $item->nippos) }}" class="btn btn-warning btn-sm"><i class="fa fa-user-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>
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
            {{ $pegawai->links()}}
        </div>
    </div>
</div>
@endsection