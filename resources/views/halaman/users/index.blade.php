@extends('templates.default')

@section('title')
<h2 class="title">Mangelola Users</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('tambah.user')}}" class="btn btn-success btn-md float-right"><i
                class="fa fa-user-plus"></i></a>
    </div>
    <div class="card-body">
        <table id="tabel_users" class="table-striped table-bordered table-responsive-sm" style="width: 100%">
            <thead class="text-center thead-light">
                <tr>
                    <th class="text-center">
                        Nama
                    </th>
                    <th class="text-center">
                        Username
                    </th>
                    <th class="text-center">
                        Level
                    </th>
                    <th class="text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#tabel_users').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/users/json') }}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'level',
                    name: 'level'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    sClass: 'text-center'
                }
            ]
        });
    });
</script>
<script>
    function confirm_delete() {
      return confirm('Apakah anda yakin untuk menghapus data ini ? ');
    }
</script>
@endpush