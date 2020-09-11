@extends('templates.default')

@section('title')
<h2 class="title">Tambah Data Bagian</h2>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{route('simpan.bagian')}}" method="post">
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
                <button type="submit" class="btn btn-success pull-right">Tambah</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection