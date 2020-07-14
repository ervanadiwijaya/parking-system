@extends('layouts.admin')
@section('body')
<div class="content-header d-flex flex-column flex-md-row mb-3">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item" aria-current="page"><a href="/karyawan">Semua Karyawan</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$user->name}}</li>
            </ol>
        </nav>
    </div>
</div>
@include('layouts.components.messageAlert')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('karyawan.update', base64_encode(str_pad($user->id, 5, '0', STR_PAD_LEFT)))}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input required name="name" value="{{$user->name}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input required name="email" value="{{$user->email}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pilih Role</label>
                            <select required name="role" class="form-control">
                                <option value="">-- Pilih Role --</option>
                                <option @if ($user->role == 'admin') selected @endif value="admin">Admin</option>
                                <option @if ($user->role == 'petugas') selected @endif value="petugas">Petugas Lapangan</option>
                            </select>
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