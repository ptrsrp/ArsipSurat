@extends('templates.default')

@section('title')
<div>
    <a href="{{route('surat-keluar')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Tambah Surat Keluar</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <form action="{{route('simpan.surat-keluar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tanggal Kirim</label>
                <input type="date" class="form-control" name="tgl_kirim" value="{{old('tgl_kirim')}}">
                @if($errors->has('tgl_kirim'))
                <div class="text-danger">
                    {{ $errors->first('tgl_kirim')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Penerima</label>
                <select class="custom-select" name="penerima">
                    @foreach ($instansi as $data)
                    <option value="{{$data->id}}" {{ old('penerima') == $data->id ? 'selected' : '' }}>{{$data->nama}}</option>
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
                <input type="text" class="form-control" name="no_surat" value="{{old('no_surat')}}">
                @if($errors->has('no_surat'))
                <div class="text-danger">
                    {{ $errors->first('no_surat')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Perihal</label>
                <input type="text" class="form-control" name="perihal" value="{{old('perihal')}}">
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
            <button type="submit" class="btn btn-success float-right">Simpan</button>
        </form>
    </div>
</div>
@endsection