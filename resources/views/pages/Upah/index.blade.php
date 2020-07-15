@extends('layouts.admin')
@section('body')
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Upah Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('upah.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Role</label>
                        <input name="role" value="" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gaji Pokok</label>
                        <input name="gaji_pokok" value="" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tunjangan Makan</label>
                        <input name="tunjangan_makan" value="" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tunjangan Transport</label>
                        <input name="tunjangan_transport" type="number" class="form-control">
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
                <li class="breadcrumb-item active" aria-current="page">Semua Upah Karyawan</li>
            </ol>
        </nav>
    </div>
    <div class="wrapper ml-0 ml-md-auto my-auto d-flex align-items-center pt-4 pt-md-0">
      <button data-toggle="modal" data-target="#new"  class="btn btn-success btn-sm ml-auto">Tambah Baru</button>
    </div>
</div>
@include('layouts.components.messageAlert')
<div class="row mb-3">
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
                                    Role
                                </th>
                                <th>
                                    Gaji Pokok
                                </th>
                                <th>
                                    Tunjangan Makan
                                </th>
                                <th>
                                    Tunjangan Transport
                                </th>
                            </tr>
                        </thead>
                        <tbody id="index_query">
                            @foreach ($upah as $key => $item)                               
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><a href="/upah/{{base64_encode($item->id)}}">{{$item->role}}</a></td>
                                    <td>Rp {{number_format($item -> gaji_pokok, 0, ',', ',')}}</td>
                                    <td>Rp {{number_format($item -> tunjangan_makan, 0, ',', ',')}}</td>
                                    <td>Rp {{number_format($item -> tunjangan_transport, 0, ',', ',')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                    Nama Karyawan
                                </th>
                                <th>
                                    Role
                                </th>
                                <th>
                                    Gaji Pokok
                                </th>
                                <th>
                                    Tunjangan Makan
                                </th>
                                <th>
                                    Tunjangan Transport
                                </th>
                            </tr>
                        </thead>
                        <tbody id="index_query">
                            @foreach ($karyawan as $key => $item)                               
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item -> name}}</td>
                                    <td>{{$item -> role}}</td>
                                    <td>Rp {{number_format($item['upah']['gaji_pokok'] ?? 0, 0, ',', ',')}}</td>
                                    <td>Rp {{number_format($item['upah']['tunjangan_makan'] ?? 0, 0, ',', ',')}}</td>
                                    <td>Rp {{number_format($item['upah']['tunjangan_transport'] ?? 0, 0, ',', ',')}}</td>                                       
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