@extends('layouts.admin')
@section('body')
<div class="content-header d-flex flex-column flex-md-row mb-3">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item" aria-current="page"><a href="/upah">Semua Upah Karyawan</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$upah->role}}</li>
            </ol>
        </nav>
    </div>
</div>
@include('layouts.components.messageAlert')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('upah.update', $upah->id)}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Role</label>
                            <input required name="role" value="{{$upah->role}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gaji Pokok</label>
                            <input required name="gaji_pokok" value="{{$upah->gaji_pokok}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tunjangan Makan</label>
                            <input required name="tunjangan_makan" value="{{$upah->tunjangan_makan}}" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tunjangan Transport</label>
                            <input required name="tunjangan_transport" value="{{$upah->tunjangan_transport}}" type="number" class="form-control">
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