@extends('templates.default')

@section('title')
<h2 class="title">Tambah Data pegawai</h2>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{route('simpan.pegawai')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>NIPPOS</label>
                    <input type="text" class="form-control" name="nippos">
                    @if($errors->has('nippos'))
                    <div class="text-danger">
                        {{ $errors->first('nippos')}}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama">
                    @if($errors->has('nama'))
                    <div class="text-danger">
                        {{ $errors->first('nama')}}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Bagian</label>
                    <select class="custom-select" name="id_bagian">
                        <option disabled value>Pilih</option>
                        @foreach ($bagian as $bag)
                        <option value="{{$bag->id}}">{{$bag->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('id_bagian'))
                    <div class="text-danger">
                        {{ $errors->first('id_bagian')}}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <select class="custom-select" name="id_bagian">
                        <option disabled value>Pilih</option>
                        @foreach ($jabatan as $jab)
                        <option value="{{$jab->id}}">{{$jab->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('id_jabatan'))
                    <div class="text-danger">
                        {{ $errors->first('id_jabatan')}}
                    </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-success pull-right">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection