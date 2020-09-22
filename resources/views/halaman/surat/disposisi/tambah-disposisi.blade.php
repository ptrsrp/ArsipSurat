@extends('templates.default')

@section('title')
<div>
    <a href="{{route('surat-masuk')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Disposisi</h2>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 style="text-align: center">Surat Masuk</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label>No. Agenda</label>
                        <p class="form-control">{{$surat_masuk->no_agenda}}</p>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Diterima</label>
                        <p class="form-control">{{$surat_masuk->tgl_diterima}}</p>
                    </div>
                    <div class="form-group">
                        <label>Instansi</label>
                        <p class="form-control">{{$surat_masuk->instansi->nama}}</p>
                    </div>
                    <div class="form-group">
                        <label>No. Surat</label>
                        <p class="form-control">{{$surat_masuk->no_surat}}</p>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <p class="form-control">{{$surat_masuk->tgl_surat}}</p>
                    </div>
                    <div class="form-group">
                        <label>Perihal</label>
                        <p class="form-control">{{$surat_masuk->perihal}}</p>
                    </div>
                    <div class="form-group">
                        <label for="file">File</label> <br>
                        <a href="{{ url('storage/arsip'.'/'.$surat_masuk->file) }}" target="_blank">
                            Lihat Dokumen</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 style="text-align: center">Lembar Disposisi</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label>Untuk</label>
                        <select class="custom-select" name="nippos_pgw">
                            @foreach ($instansi as $data)
                            <option value="{{$data->id}}" {{ old('id_instansi') == $data->id ? 'selected' : '' }}>{{$data->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Isi Disposisi</label>
                        <textarea class="form-control" name="isi" rows="5" style="width:485px">{{$surat_masuk->instansi->nama}}</textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection