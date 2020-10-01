@extends('templates.default')

@section('title')
<div>
    <a href="{{route('surat-keluar')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Edit Data Surat Keluar</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <form action="{{route('update.surat-keluar', $surat_keluar->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Tanggal kirim</label>
                <input type="date" class="form-control" name="tgl_kirim"
                    value="{{$surat_keluar->tgl_kirim ? : old('tgl_kirim')}}">
                @if($errors->has('tgl_kirim'))
                <div class="text-danger">
                    {{ $errors->first('tgl_kirim')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Instansi</label>
                <select class="custom-select" name="penerima">
                    @foreach ($instansi as $data)
                    <option value="{{$data->id}}" {{ $surat_keluar->penerima == $data->id ? 'selected' : '' }}>
                        {{$data->nama}}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('penerima'))
                <div class="text-danger">
                    {{ $errors->first('penerima')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>No. Surat</label>
                <input type="text" class="form-control" name="no_surat"
                    value="{{$surat_keluar->no_surat ? : old('no_surat')}}">
                @if($errors->has('no_surat'))
                <div class="text-danger">
                    {{ $errors->first('no_surat')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Perihal</label>
                <input type="text" class="form-control" name="perihal"
                    value="{{$surat_keluar->perihal ? : old('perihal')}}">
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