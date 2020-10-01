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
        <div class="row">
            <div class="col-md-6">
                <div class="row input date-range">
                    <div class="col-md-4">
                        <input type="input" name="from_date" id="from_date" class="form-control" placeholder="Dari Tanggal" readonly/>
                    </div>
                    <div class="col-md-4">
                        <input type="input" name="to_date" id="to_date" class="form-control" placeholder="Sampai Tanggal" readonly />
                    </div>
                    <div class="col-md-4">
                        <button type="button" name="filter" id="filter" class="btn btn-primary btn-sm"><i class="fas fa-filter"></i></button>
                        <button type="button" name="refresh" id="refresh" class="btn btn-default btn-sm"><i class="fas fa-sync"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <a href="{{route('tambah.disposisi')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i><b>Tambah Data</b></a>
                <a href="{{route('tambah.disposisi')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-print"></i><b>Cetak Laporan</b></a>
            </div>
        </div>
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