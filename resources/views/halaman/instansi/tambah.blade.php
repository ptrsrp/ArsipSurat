@extends('templates.default')

@section('title')
<div class="col-4">
    <a href="{{route('instansi')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Tambah Data Instansi</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <form action="{{route('simpan.instansi')}}" method="post">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama">
                @if($errors->has('nama'))
                <div class="text-danger">
                    {{ $errors->first('nama')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" rows="3" name="alamat"></textarea>
                @if($errors->has('alamat'))
                <div class="text-danger">
                    {{ $errors->first('alamat')}}
                </div>
                @endif
            </div>
            <button type="submit" class="btn btn-success pull-right">Simpan</button>
        </form>
    </div>
</div>
@endsection