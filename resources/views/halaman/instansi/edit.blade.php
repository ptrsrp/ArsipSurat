@extends('templates.default')

@section('title')
<div class="col-4">
    <a href="{{URL::previous()}}" style="color:white" class="badge badge-dark"><i class="fa fa-arrow-left"></i> Back</a>
  </div>
<h2 class="title">Edit Data Instansi</h2>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{route('update.instansi',$instansi->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" name="id" class="form-control" value="{{$instansi->id}}" readonly>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$instansi->nama}}">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="3" class="form-control"> {{$instansi->alamat}} </textarea>
                </div>
                    <button type="submit" class="btn btn-success pull-right">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection