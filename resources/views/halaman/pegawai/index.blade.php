@extends('templates.default')

@section('title')
<h2 class="title">Manajemen Pegawai</h2>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <a class="card-link" href="#">
            <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <h3 class="card-title">Pegawai</h3>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a class="card-link" href="#">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-paper-plane"></i>
                    </div>
                    <h3 class="card-title">Bagian</h3>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a class="card-link" href="#">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-tasks"></i>
                    </div>
                    <h3 class="card-title">Jabatan</h3>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </a>
    </div>
</div>
@endsection