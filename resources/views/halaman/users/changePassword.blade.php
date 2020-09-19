@extends('templates.default')

@section('title')
<div class="col-4">
    <a href="{{route('users')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<h2 class="title">Ganti Password User</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <form action="#" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" name="id" class="form-control" value="{{$user->id}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Password Saat Ini</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        @if($errors->has('name'))
                        <div class="text-danger">
                            {{ $errors->first('name')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        @if($errors->has('level'))
                        <div class="text-danger">
                            {{ $errors->first('level')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="text" name="username" class="form-control" value="{{$user->username}}">
                        @if($errors->has('username'))
                        <div class="text-danger">
                            {{ $errors->first('username')}}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection