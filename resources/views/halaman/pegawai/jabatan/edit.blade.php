@extends('templates.default')

@section('title')
<h2 class="title">Edit Data jabatan</h2>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{route('update.jabatan',$jabatan->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" name="id" class="form-control" value="{{$jabatan->id}}" readonly>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$jabatan->nama}}">
                    @if($errors->has('nama'))
                    <div class="text-danger">
                        {{ $errors->first('nama')}}
                    </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-success float-right">Update</button>
            </form>
        </div>
    </div>
@endsection