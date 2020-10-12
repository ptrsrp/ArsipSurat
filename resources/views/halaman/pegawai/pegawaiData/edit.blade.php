@extends('templates.default')

@section('title')
<h2 class="title">Edit Data Pegawai</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <form action="{{route('update.pegawai', $pegawai->nippos)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>NIPPOS</label>
                <input type="text" name="nippos" class="form-control" value="{{$pegawai->nippos}}">
                @if($errors->has('nippos'))
                <div class="text-danger">
                    {{ $errors->first('nippos')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{$pegawai->nama}}">
                @if($errors->has('nama'))
                <div class="text-danger">
                    {{ $errors->first('nama')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Bagian</label>
                <select class="custom-select" name="id_bagian">
                    @foreach ($bagian as $bag)
                    <option value="{{$bag->id}}" {{ $pegawai->id_bagian== $bag->id ? 'selected' : '' }}>{{$bag->nama}}
                    </option>
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
                <select class="custom-select" name="id_jabatan">
                    @foreach ($jabatan as $jab)
                    <option value="{{$jab->id}}" {{ $pegawai->id_jabatan == $jab->id ? 'selected' : '' }}>{{$jab->nama}}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('id_jabatan'))
                <div class="text-danger">
                    {{ $errors->first('id_jabatan')}}
                </div>
                @endif
            </div>
            <button type="submit" class="btn btn-success float-right">Update</button>
        </form>
    </div>
</div>
@endsection