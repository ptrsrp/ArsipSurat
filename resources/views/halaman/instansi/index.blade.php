@extends('templates.default')

@section('title')
<h2 class="title">Mangelola Instansi</h2>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('tambah_instansi')}}">
                    <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Tambah Data</button>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive table-bordered">
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
                            <tr>
                                <td>1</td>
                                <td>2</td>
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