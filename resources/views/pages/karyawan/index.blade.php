@extends('layouts.admin')
@section('body')
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('karyawan.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input required name="name" value="" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input required name="email" value="" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pilih Role</label>
                        <select required name="role" class="form-control">
                            <option value="">-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas Lapangan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="content-header d-flex flex-column flex-md-row mb-3">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item active" aria-current="page">Semua Karyawan</li>
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
                {{-- <div class="form-group">
                    <input id="search" type="search" class="form-control" placeholder="Search Here / invoice / nama lengkap">
                </div> --}}
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Role
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Ditambahkan
                                </th>
                            </tr>
                        </thead>
                        <tbody id="index_query">
                            @foreach ($karyawan as $key => $item)    
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><a href="/karyawan/{{base64_encode(str_pad($item->id, 5, '0', STR_PAD_LEFT))}}">{{$item->name}}</a></td>
                                    <td>
                                        @switch($item->role)
                                            @case('admin')
                                                <label class="badge badge-info">{{$item->role}}</label>
                                                @break
                                            @case('petugas')
                                                <label class="badge badge-success">{{$item->role}}</label>
                                                @break
                                            @default
                                                <label class="badge badge-danger">{{$item->role}}</label>
                                        @endswitch
                                    </td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection