@extends('templates.default')
@section('content')
<div class="card card-info card-outline">
    <div class="card-header">
        <h3>Lembar Disposisi</h3>
    </div>
    <div class="card-body">
        <table>
            <tr>
                <td width="130">Surat Dari</td>
                <td width="1">:</td>
                <td> &nbsp;{{ $disposisi->surat_masuk->instansi->nama }}</td>
            </tr>
            <tr>
                <td width="130">No. Surat</td>
                <td width="1">:</td>
                <td> &nbsp;{{ $disposisi->surat_masuk->no_surat }}</td>
            </tr>
            <tr>
                <td width="130">Perihal Surat</td>
                <td width="1">:</td>
                <td> &nbsp;{{ $disposisi->surat_masuk->perihal }}</td>
            </tr>
            <tr>
                <td width="130">Tujuan Disposisi Untuk</td>
                <td width="1">:</td>
                <td> &nbsp;{{ $disposisi->pegawai->nama }}</td>
            </tr>
            <tr>
                <td width="130">Isi Disposisi</td>
                <td width="1">:</td>
                <td> &nbsp;{{ $disposisi->isi }}</td>
            </tr>
        </table>
        <button class="btn btn-primary btn-sm cetak"><i class="fa fa-print"></i> Cetak</button>
    </div>
</div>
@endsection