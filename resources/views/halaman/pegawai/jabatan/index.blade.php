@extends('templates.default')

@section('title')
<div>
    <a href="{{route('pegawai')}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i>
        Kembali</a>
</div>
<h2 class="title">Mangelola Jabatan</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('tambah.jabatan')}}" class="btn btn-success float-right">Tambah <i class="fa fa-plus"></i></a>
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
                    searchable: false
                }
            ]
        });
    });
</script>
@endpush