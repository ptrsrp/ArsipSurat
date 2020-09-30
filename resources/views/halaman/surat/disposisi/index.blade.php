@extends('templates.default')

@section('title')
<div>
    <a href="{{route('surat')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Disposisi</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('tambah.disposisi')}}" class="btn btn-success float-right"><i class="fas fa-plus"></i>
            <b>Tambah Data</b></a>
    </div>
    <div class="card-body">
        <table id="tabel_disposisi" class="table-striped table-bordered table-responsive-sm" style="width: 100%">
            <thead class="text-center thead-light">
                <tr>
                    <th>
                        Surat Masuk
                    </th>
                    <th>
                        Tujuan Disposisi
                    </th>
                    <th>
                        Isi
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
        $('#tabel_disposisi').DataTable({
            processing: true,
            serverSide: true,
            "order": [
                [0, "desc"]
            ],
            ajax: "{{ url('/disposisi/json') }}",
            columns: [{
                    data: 'id_surat_masuk',
                    name: 'id_surat_masuk'
                },
                {
                    data: 'nippos_pgw',
                    name: 'nippos_pgw'
                },
                {
                    data: 'isi',
                    name: 'isi'
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