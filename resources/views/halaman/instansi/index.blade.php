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
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection