@extends('templates.default')

@section('title')
<h2 class="title">Pengaturan Akun</h2>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a class="active" href="#editprofil">Edit Profil</a></li>
                        <li class="tab col s3"><a href="#gantipassword">Ganti Password</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="editprofil">
                <form action="{{route('user.update', $data->id)}}" method="post">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="id" class="form-control" value="{{$data->id}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" value="{{$data->name}}">
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select class="custom-select" name="level">
                                <option value="admin" {{ $data->level== "admin" ? 'selected' : '' }}>Admin</option>
                                <option value="petugas" {{ $data->level== "petugas" ? 'selected' : '' }}>Petugas
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="{{$data->username}}">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Update Profil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection