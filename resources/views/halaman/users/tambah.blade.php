@extends('templates.default')

@section('title')
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
                <input type="text" class="form-control" name="username" value="{{old('username')}}">
                @if($errors->has('username'))
                <div class="text-danger">
                    {{ $errors->first('username')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Password</label>
                <p class="text text-warning">Password Awal Otomatis 123456</p>
                <input type="password" class="form-control" name="password" value="123456" readonly>
                @if($errors->has('password'))
                <div class="text-danger">
                    {{ $errors->first('password')}}
                </div>
                @endif
            </div>
            <button type="submit" class="btn btn-success float-right">Simpan</button>
        </form>
    </div>
</div>
@endsection