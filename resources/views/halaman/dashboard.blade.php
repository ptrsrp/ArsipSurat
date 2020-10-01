@extends('templates.default')

@section('title')
<h2 class="title">Bagian SDM & Dukungan Umum</h2>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-tabs card-header-warning">
                <h4 class="card-title" style="text-transform:uppercase">Selamat Datang {{auth()->user()->name}}</h4>
            </div>
            <div class="card-body" style="text-transform:uppercase">
                Anda Berada Di Dashboard {{auth()->user()->level}} 
            </div>
        </div>
    </div>
  </div>
</div>
@endsection