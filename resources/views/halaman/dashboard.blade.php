@extends('templates.default')

@section('title')
    <h2 class="title">Pengarsipan Surat Kantor Pos Pati</h2>
@endsection
@section('content')
<h3>Selamat datang {{auth()->user()->name}} di halaman {{auth()->user()->level}} </h3>
@endsection