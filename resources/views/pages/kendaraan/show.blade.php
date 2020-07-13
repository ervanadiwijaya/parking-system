@extends('layouts.admin')
@section('body')
<div class="content-header d-flex flex-column flex-md-row mb-3">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item" aria-current="page"><a href="/kendaraan">Semua Jenis Kendaraan</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$kendaraan->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="wrapper ml-0 ml-md-auto my-auto d-flex align-items-center pt-4 pt-md-0">
      <button data-toggle="modal" data-target="#new"  class="btn btn-success btn-sm ml-auto">Tambah Baru</button>
    </div>
</div>
@include('layouts.components.messageAlert')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('kendaraan.update', $kendaraan->id)}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Prefix Id</label>
                            <input required name="prefix" value="{{$kendaraan->prefix}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kendaraan</label>
                            <input required name="name" value="{{$kendaraan->name}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tarif / Jam</label>
                            <input required name="tarif_perjam" value="{{$kendaraan->tarif_perjam}}" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tarif 2 Jam Pertama</label>
                            <input required name="tarif_awal" value="{{$kendaraan->tarif_awal}}" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tarif Maksimal</label>
                            <input required name="tarif_max" value="{{$kendaraan->tarif_max}}" type="number" class="form-control">
                        </div>
                    </div>
                    <button type="submit" name="_method" value="put" class="btn btn-primary">Ubah Data</button>
                    <button type="submit" name="_method" value="delete" class="btn btn-danger" data-dismiss="modal">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection