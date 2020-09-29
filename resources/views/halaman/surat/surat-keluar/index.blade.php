@extends('templates.default')

@section('title')
<div>
    <a href="{{route('surat')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Mangelola Surat Keluar</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('tambah.surat-keluar')}}" class="btn btn-success float-right"><i class="fas fa-plus"></i>
            <b>Tambah Data</b></a>
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
                    searchable: false
                }
            ]
        });
    });
</script>
@endpush