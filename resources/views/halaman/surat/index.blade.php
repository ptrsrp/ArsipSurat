@extends('templates.default')

@section('title')
<h2 class="title">Manajemen Surat</h2>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
    <a class="card-link" href="{{route('surat_masuk')}}">
            <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <h3 class="card-title">Surat Masuk</h3>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <a class="card-link" href="#">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-paper-plane"></i>
                    </div>
                    <h3 class="card-title">Surat Keluar</h3>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <a class="card-link" href="#">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-tasks"></i>
                    </div>
                    <h3 class="card-title">Disposisi Surat</h3>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <a class="card-link" href="#">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <h3 class="card-title">Buku Agenda</h3>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </a>
    </div>
</div>
@endsection