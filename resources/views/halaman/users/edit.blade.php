@extends('templates.default')

@section('title')
<h2 class="title">Edit Data User</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <form action="{{ route('update.user', $user->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" name="id" class="form-control" value="{{$user->id}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        @if($errors->has('name'))
                        <div class="text-danger">
                            {{ $errors->first('name')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="custom-select" name="level">
                            <option value="admin" {{ $user->level== "admin" ? 'selected' : '' }}>Admin</option>
                            <option value="petugas" {{ $user->level== "petugas" ? 'selected' : '' }}>Petugas
                            </option>
                        </select>
                        @if($errors->has('level'))
                        <div class="text-danger">
                            {{ $errors->first('level')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Username</label>
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