@extends('templates.default')

@section('title')
<h2 class="title">Pengaturan Akun</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('profil.edit')}}" class="btn btn-outline-warning">Edit Profil</a>
        <a href="{{route('profil.password')}}" class="btn btn-outline-warning active"
            style="background-color: orange; color:white">Ganti Password</a>
    </div>
    <div class="card-body">
        <div id="editprofil">
            <form action="#" method="post">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Password Saat Ini</label>
                        <input type="text" name="name" class="form-control">
                        @if($errors->has('name'))
                        <div class="text-danger">
                            {{ $errors->first('name')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="text" name="name" class="form-control">
                        @if($errors->has('level'))
                        <div class="text-danger">
                            {{ $errors->first('level')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="text" name="username" class="form-control">
                        @if($errors->has('username'))
                        <div class="text-danger">
                            {{ $errors->first('username')}}
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
</div>
@endsection