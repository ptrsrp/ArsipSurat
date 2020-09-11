@extends('templates.default')

@section('title')
<div>
    <a href="{{URL::previous()}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<h2 class="title">Mangelola Bagian</h2>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form class="form-inline float-left">
                    <input class="form-control mr-sm-2" type="search" placeholder="Cari">
                    <a type="button"><i class="material-icons">search</i></a>
                </form>
                <a href="{{ route('tambah.bagian')}}" class="btn btn-success float-right">Tambah <i
                    class="fa fa-plus"></i></a>
            </div>
            <div class="card-body">
                <div class="badge badge-primary pull-left" style="margin-bottom: 20px">Total Data : {{ $bagian->total()}}</div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center thead-light">
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;?>
                            @foreach ($bagian as $item)
                            <?php $no++;?>
                            <tr>
                                <td class="text-center">{{ $no }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="text-center">
                                    <form action="{{ route('hapus.bagian', $item->id) }}" method="post" onsubmit="return confirm('Yakin Hapus Data?')">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('edit.bagian', $item->id) }}"
                                            class="btn btn-warning btn-sm"><i class="material-icons">edit</i></a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="material-icons">delete</i></button>
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
                    {{ $bagian->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection