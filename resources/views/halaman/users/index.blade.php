@extends('templates.default')

@section('title')
<h2 class="title">Mangelola Users</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <form class="form-inline float-left">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari">
            <a type="button"><i class="fa fa-search"></i></a>
        </form>
        <a href="{{ route('tambah.user')}}" class="btn btn-success btn-md float-right"><i class="fa fa-user-plus"></i></a>
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
                        <td>{{ $item->updated_at }}</td>
                        <td class="text-center">
                            <form action="{{ route('hapus.user', $item->id) }}" method="post"
                                onsubmit="return confirm('Yakin Hapus Data?')">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('gantipassword.user', $item->id) }}" class="btn btn-info btn-sm"><i class="fa fa-user-lock"></i></a>
                                <a href="{{ route('edit.user', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-user-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>
                            </form>
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
@endsection