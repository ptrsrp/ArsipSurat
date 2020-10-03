@extends('templates.default')

@section('title')
<div>
    <a href="{{route('pegawai')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Mangelola Pegawai</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('tambah.pegawai')}}" class="btn btn-success btn-sm float-right"><i
                class="fa fa-user-plus"></i></a>
    </div>
    <div class="card-body">
        <table id="tabel_pegawai" class="table-striped table-bordered table-responsive-sm" style="width: 100%">
            <thead class="text-center thead-light">
                <tr>
                    <th>
                        NIPPOS
                    </th>
                    <th>
                        Nama
                    </th>
                    <th>
                        Bagian
                    </th>
                    <th>
                        Jabatan
                    </th>
                    <th>
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
        $('#tabel_pegawai').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/data-pegawai/json') }}",
            columns: [{
                    data: 'nippos',
                    name: 'nippos'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'id_bagian',
                    name: 'id_bagian'
                },
                {
                    data: 'id_jabatan',
                    name: 'id_jabatan'
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