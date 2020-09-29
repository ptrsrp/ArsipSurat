@extends('templates.default')

@section('title')
<div>
    <a href="{{route('pegawai')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Mangelola Bagian</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('tambah.bagian')}}" class="btn btn-success float-right"><b>Tambah Data</b></a>
    </div>
    <div class="card-body">
        <table id="tabel_bagian" class="table-striped table-bordered table-responsive-sm" style="width: 100%">
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
        $('#tabel_bagian').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/bagian/json') }}",
            columns: [{
                    data: 'nama',
                    name: 'nama'
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