@extends('templates.default')

@section('title')
<h2 class="title">Mangelola Jabatan</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('tambah.jabatan')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> <b>Tambah Data</b></a>
    </div>
    <div class="card-body">
        <table id="tabel_jabatan" class="table-striped table-bordered table-responsive-sm" style="width: 100%">
            <thead class="text-center thead-light">
                <tr>
                    <th class="text-center">
                        Nama
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
        $('#tabel_jabatan').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/jabatan/json') }}",
            columns: [{
                    data: 'nama',
                    name: 'nama'
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