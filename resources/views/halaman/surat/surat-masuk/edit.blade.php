@extends('templates.default')

@section('title')
<div>
    <a href="{{route('surat-masuk')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Edit Data Surat Masuk</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <form action="{{route('update.surat-masuk', $surat_masuk->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>No. Agenda</label>
                <input type="text" class="form-control" name="no_agenda"
                    value="{{$surat_masuk->no_agenda ? : old('no_agenda')}}">
                @if($errors->has('no_agenda'))
                <div class="text-danger">
                    {{ $errors->first('no_agenda')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Tanggal Diterima</label>
                <input type="date" class="form-control" name="tgl_diterima"
                    value="{{$surat_masuk->tgl_diterima ? : old('tgl_diterima')}}">
                @if($errors->has('tgl_diterima'))
                <div class="text-danger">
                    {{ $errors->first('tgl_diterima')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Instansi</label>
                <select class="custom-select" name="id_instansi">
                    @foreach ($instansi as $data)
                    <option value="{{$data->id}}" {{ $surat_masuk->id_instansi == $data->id ? 'selected' : '' }}>
                        {{$data->nama}}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('id_instansi'))
                <div class="text-danger">
                    {{ $errors->first('id_instansi')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>No. Surat</label>
                <input type="text" class="form-control" name="no_surat"
                    value="{{$surat_masuk->no_surat ? : old('no_surat')}}">
                @if($errors->has('no_surat'))
                <div class="text-danger">
                    {{ $errors->first('no_surat')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Tanggal Surat</label>
                <input type="date" class="form-control" name="tgl_surat"
                    value="{{$surat_masuk->tgl_surat ? : old('tgl_surat')}}">
                @if($errors->has('tgl_surat'))
                <div class="text-danger">
                    {{ $errors->first('tgl_surat')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Perihal</label>
                <input type="text" class="form-control" name="perihal"
                    value="{{$surat_masuk->perihal ? : old('perihal')}}">
                @if($errors->has('perihal'))
                <div class="text-danger">
                    {{ $errors->first('perihal')}}
                </div>
                @endif
            </div>
            <div class="custom-file">
                <label for="file">Pilih file yang ingin diupload</label>
                <p class="text text-warning">(Jika lebih dari satu file maka gunakan format pdf atau docx)</p>
                <input type="file" class="form-control-file" id="file" name="file">
                @if($errors->has('file'))
                <div class="text-danger">
                    {{ $errors->first('file')}}
                </div>
                @endif
            </div>
            <button type="submit" class="btn btn-success float-right">Update</button>
        </form>
    </div>
</div>
@endsection