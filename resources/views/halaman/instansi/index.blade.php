@extends('templates.default')

@section('title')
<h2 class="title">Mangelola Instansi</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <form class="form-inline float-left">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari">
            <a type="button"><i class="fas fa-search"></i></a>
        </form>
        <a href="{{ route('tambah.instansi')}}" class="btn btn-success float-right"><b>Tambah Data</b></a>
    </div>
    <div class="card-body">
        <table id="tabel_instansi" class="table-striped table-bordered table-responsive-sm" style="width: 100%">
            <thead class="text-center thead-light">
                <tr>
                    <th>
                        Nama
                    </th>
                    <th>
                        Alamat
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
        $('#tabel_instansi').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/instansi/json') }}",
            columns: [{
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
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