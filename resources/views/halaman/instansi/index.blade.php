@extends('templates.default')

@section('title')
<h2 class="title">Mangelola Instansi</h2>
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
                <a href="{{route('tambah_instansi')}}" class="float-right">
                    <button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Data</button>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Alamat
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            </tr>
                            @endforeach   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection