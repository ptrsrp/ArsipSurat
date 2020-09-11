@extends('templates.default')

@section('title')
<h2 class="title">Tambah Data Instansi</h2>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{route('simpan.instansi')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" rows="3" name="alamat"></textarea>
                </div>
                <button type="submit" class="btn btn-success pull-right">Tambah</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection