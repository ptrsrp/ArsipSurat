@extends('templates.default')

@section('title')
<div class="col-4">
    <a href="{{route('users')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Tambah Data user</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <form action="{{route('simpan.user')}}" method="post">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                @if($errors->has('name'))
                <div class="text-danger">
                    {{ $errors->first('name')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Level</label>
                <select class="custom-select" name="level">
                    <option value="admin" {{old('level') == 'admin' ? 'selected' : ''}}>Admin</option>
                    <option value="petugas" {{old('level') == 'petugas' ? 'selected' : ''}}>Petugas</option>
                </select>
                @if($errors->has('level'))
                <div class="text-danger">
                    {{ $errors->first('level')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username">
                @if($errors->has('username'))
                <div class="text-danger">
                    {{ $errors->first('username')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
                @if($errors->has('password'))
                <div class="text-danger">
                    {{ $errors->first('password')}}
                </div>
                @endif
            </div>
            <button type="submit" class="btn btn-success pull-right">Tambah</button>
        </form>
    </div>
</div>
@endsection