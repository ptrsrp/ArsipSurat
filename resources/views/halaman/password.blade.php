@extends('templates.default')

@section('title')
<h2 class="title">Pengaturan Akun</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('profil.edit')}}" class="btn btn-outline-warning">Edit Profil</a>
        <a href="{{route('ganti.password')}}" class="btn btn-outline-warning active"
            style="background-color: orange; color:white">Ganti Password</a>
    </div>
    <div class="card-body">
    <form action="{{route('update.password')}}" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <div class="form-group">
                    <label>Password Saat Ini</label>
                <input type="password" name="password_lama" class="form-control" value="{{old('password_lama')}}">
                    @if($errors->has('password_lama'))
                    <div class="text-danger">
                        {{ $errors->first('password_lama')}}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="password_baru" class="form-control">
                    @if($errors->has('password_baru'))
                    <div class="text-danger">
                        {{ $errors->first('password_baru')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-success">Update Password</button>
            </div>
        </form>
    </div>
</div>
@endsection