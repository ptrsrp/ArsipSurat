@extends('templates.default')

@section('title')
<h2 class="title">Bagian SDM & Dukungan Umum</h2>
@endsection
@section('content')
<h3 style="text-align: center; text-transform:uppercase">Selamat Datang {{auth()->user()->name}} di Halaman {{auth()->user()->level}} <br>
    Aplikasi Pengarsipan Surat Masuk dan Surat Keluar <br>
    Kantor Pos Pati</h3>
<div class="card">
    <img src="{{asset('assets/img/pos.jpg')}}">

</div>
@endsection