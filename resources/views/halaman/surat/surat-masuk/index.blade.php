@extends('templates.default')

@section('title')
<div>
    <a href="{{route('surat')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Mangelola Surat Masuk</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('tambah.surat-masuk')}}" class="btn btn-success float-right"><i class="fas fa-plus"></i>
            <b>Tambah Data</b></a>
    </div>
    <div class="card-body">
        <table id="tabel_surat_masuk" class="table-striped table-bordered table-responsive-sm" style="width: 100%">
            <thead class="text-center thead-light">
                <tr>
                    <th>
                        No. Agenda
                    </th>
                    <th>
                        Tanggal Diterima
                    </th>
                    <th>
                        Instansi
                    </th>
                    <th>
                        No. Surat
                    </th>
                    <th>
                        Tanggal Surat
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
        $('#tabel_surat_masuk').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/surat-masuk/json') }}",
            columns: [{
                    data: 'no_agenda',
                    name: 'no_agenda'
                },
                {
                    data: 'tgl_diterima',
                    name: 'tgl_diterima'
                },
                {
                    data: 'instansi',
                    name: 'instansi'
                },
                {
                    data: 'no_surat',
                    name: 'no_surat'
                },
                {
                    data: 'tgl_surat',
                    name: 'tgl_surat'
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