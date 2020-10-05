@extends('templates.default')

@section('title')
<h2 class="title">Disposisi</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 style="text-align: center">Lembar Disposisi</h4>
    </div>
    <div class="card-body">
        <form action="{{route('simpan.disposisi')}}" method="post">
            @csrf
            <div class="form-group">
                <label>Nomor Surat Masuk</label>
                <select class="custom-select" name="id_surat_masuk">
                    @foreach ($surat_masuk as $data)
                    <option value="{{$data->id}}">
                        {{$data->no_surat}}</option>
                    @endforeach
                </select>
                @if($errors->has('id_surat_masuk'))
                <div class="text-danger">
                    {{ $errors->first('id_surat_masuk')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Tujuan Disposisi</label>
                <select class="custom-select" name="nippos_pgw">
                    @foreach ($pegawai as $data)
                    <option value="{{$data->nippos}}">
                        {{$data->nama}}</option>
                    @endforeach
                </select>
                @if($errors->has('nippos_pgw'))
                <div class="text-danger">
                    {{ $errors->first('nippos_pgw')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Isi Disposisi</label>
                <textarea class="form-control" name="isi" rows="5"></textarea>
                @if($errors->has('isi'))
                <div class="text-danger">
                    {{ $errors->first('isi')}}
                </div>
                @endif
            </div>
            <button type="submit" class="btn btn-success float-right">Simpan</button>
        </form>
    </div>
</div>
@endsection