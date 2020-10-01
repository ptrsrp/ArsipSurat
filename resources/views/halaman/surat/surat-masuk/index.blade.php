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
        <div class="row">
            <div class="col-md-6">
                <div class="row input-daterange">
                    <div class="col-md-4">
                        <input type="input" name="from_date" id="from_date" class="form-control"
                            placeholder="Dari Tanggal" readonly />
                    </div>
                    <div class="col-md-4">
                        <input type="input" name="to_date" id="to_date" class="form-control"
                            placeholder="Sampai Tanggal" readonly />
                    </div>
                    <div class="col-md-4">
                        <button type="button" name="filter" id="filter" class="btn btn-primary btn-sm"><i
                                class="fas fa-filter"></i></button>
                        <button type="button" name="refresh" id="refresh" class="btn btn-default btn-sm"><i
                                class="fas fa-sync"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <a href="{{route('tambah.surat-masuk')}}" class="btn btn-success btn-sm float-right"><i
                        class="fas fa-plus"></i><b>Tambah Data</b></a>
                <a href="{{route('tambah.surat-masuk')}}" class="btn btn-success btn-sm float-right"><i
                        class="fas fa-print"></i><b>Cetak Laporan</b></a>
            </div>
        </div>
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
    $(document).ready(function () {
        load_data();
        $('.input-daterange').datepicker({
            todayBtn: 'linked',
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $('#filter').click(function () {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            if (from_date != '' && to_date != '') {
                $('#tabel_surat_masuk').DataTable().destroy();
                load_data(from_date, to_date);
            } else {
                alert('Both Date is required');
            }
        });
        $('#refresh').click(function () {
            $('#from_date').val('');
            $('#to_date').val('');
            $('#tabel_surat_masuk').DataTable().destroy();
            load_data();
        });

        function load_data(from_date = '', to_date = '') {
            $('#tabel_surat_masuk').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/surat-masuk/json') }}",
                    type: 'GET',
                    data: {
                        from_date:from_date,
                        to_date:to_date
                    }
                },
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
                        searchable: false,
                        sClass: 'text-center'
                    }
                ]
            });
        };
    });
</script>
<script>
    function confirm_delete() {
        return confirm('Apakah anda yakin untuk menghapus data ini ? ');
    }
</script>
@endpush