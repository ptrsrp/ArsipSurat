@extends('templates.default')

@section('title')
<div class="col-4">
    <a href="{{route('disposisi')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Edit Data Disposisi</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <form action="{{route('update.disposisi',$disposisi->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nomor Surat Masuk</label>
                <select class="custom-select" name="id_surat_masuk">
                    @foreach ($surat_masuk as $data)
                    <option value="{{$data->id}}" {{ $disposisi->id_surat_masuk == $data->id ? 'selected' : '' }}>{{$data->no_surat}}
                    </option>
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
                    <option value="{{$data->nippos}}" {{ $disposisi->nippos_pgw == $data->nippos ? 'selected' : '' }}>{{$data->nama}}
                    </option>
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
                <textarea class="form-control" name="isi" rows="5">{{$disposisi->isi}}</textarea>
                @if($errors->has('isi'))
                <div class="text-danger">
                    {{ $errors->first('isi')}}
                </div>
                @endif
            </div>
            <button type="submit" class="btn btn-success pull-right">Update</button>
        </form>
    </div>
</div>
@endsection