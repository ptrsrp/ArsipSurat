@extends('templates.default')

@section('title')
<h2 class="title">Mangelola Users</h2>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form class="form-inline float-left">
                    <input class="form-control mr-sm-2" type="search" placeholder="Cari">
                    <a type="button"><i class="material-icons">search</i></a>
                </form>
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#tambahModal">Tambah <i
                        class="fa fa-plus"></i></button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center thead-light">
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Level
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Dibuat pada
                                </th>
                                <th>
                                    Diupdate pada
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;?>
                            @foreach ($user as $item)
                            <?php $no++;?>
                            <tr>
                                <td class="text-center">{{ $no }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->level }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updatet_at }}</td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#editpassModal-{{ $item->id }}"><i
                                            class="fa fa-lock"></i></button>
                                    <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#editModal-{{ $item->id }}"><i
                                        class="material-icons">edit</i></button>
                                    <a href="{{ route('hapus.user', $item->id) }}" class="btn btn-danger btn-sm"><i
                                            class="material-icons">delete</i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="pagination justify-content-end">
                    {{ $user->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- MODAL --}}

@section('modal')

{{-- TAMBAH --}}
<div class="modal fade" tabindex="-1" role="dialog" id="tambahModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Tambah Data User</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('simpan.user')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select class="custom-select" name="level">
                                <option selected>Pilih</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- EDIT --}}
@foreach ($user as $data)
<div class="modal fade" tabindex="-1" role="dialog" id="editModal-{{ $data->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Edit Data User</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('update.user', $data->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
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
                                <option value = "admin" {{ $data->level== "admin" ? 'selected' : '' }}>Admin</option>
                                <option value = "petugas" {{ $data->level== "petugas" ? 'selected' : '' }}>Petugas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="{{$data->username}}">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- CHANGE PASSWORD --}}
@foreach ($user as $data)
<div class="modal fade" tabindex="-1" role="dialog" id="editpassModal-{{ $data->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Ganti Password</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ganti.password')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="id" class="form-control" value="{{$data->id}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Password Lama</label>
                            <input type="password" name="old_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password') <div class="invalid feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Ganti Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection