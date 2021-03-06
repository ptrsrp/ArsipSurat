@extends('templates.default')

@section('title')
<h2 class="title">Mangelola Surat Keluar</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="col-md-14">
            <a href="{{route('tambah.surat-keluar')}}" class="btn btn-success btn-sm float-right"><i
                    class="fas fa-plus"></i><b>Tambah Data</b></a>
            <a href="{{route('periode.surat-keluar')}}" class="btn btn-success btn-sm float-right"><i
                    class="fas fa-eye"></i> <b> Lihat Laporan</b></a>
        </div>
    </div>
    <div class="card-body">
        <table id="tabel_surat_keluar" class="table-striped table-bordered table-responsive-sm" style="width: 100%">
            <thead class="text-center thead-light">
                <tr>
                    <th>
                        Tanggal Kirim
                    </th>
                    <th>
                        Penerima
                    </th>
                    <th>
                        No. Surat
                    </th>
                    <th>
                        Perihal
                    </th>
                    <th>
                        File
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
        $('#tabel_surat_keluar').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/surat-keluar/json') }}",
            columns: [{
                    data: 'tgl_kirim',
                    name: 'tgl_kirim'
                },
                {
                    data: 'penerima',
                    name: 'penerima'
                },
                {
                    data: 'no_surat',
                    name: 'no_surat'
                },
                {
                    data: 'perihal',
                    name: 'perihal'
                },
                {
                    data: 'file',
                    name: 'file'
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