@extends('templates.default')

@section('content')
<div class="card card-info card-outline">
    <div class="card-header">
        <h3>Periode Surat Masuk</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Dari Tanggal</label>
            <input type="date" name="tgl_awal" id="tgl_awal" class="form-control">
        </div>
        <div class="form-group">
            <label>Sampai Tanggal</label>
            <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">
        </div>
        <a href=""
            onclick="this.href='/show-surat-masuk/'+ document.getElementById('tgl_awal').value + '/' + document.getElementById('tgl_akhir').value"
            target="_blank" class="btn btn-warning btn-sm float-right"><i class="fas fa-eye"></i> <b>Tampilkan Data</b></a>
    </div>
</div>
@endsection