@extends('layouts.admin')
@section('body')
<div class="content-header d-flex flex-column flex-md-row mb-3">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item active" aria-current="page">Data kendaraan masuk</li>
            </ol>
        </nav>
    </div>
</div>
@include('layouts.components.messageAlert')
<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('masuk.store')}}">
                    @csrf
                    <div class="form-row">
                      <div class="col">
                            <select required name="jenis_kendaraan" class="form-control">
                                <option value="">-- Pilih Jenis Kendaraan --</option>
                                @foreach ($jenis_kendaraan as $kendaraan)
                                    <option value="{{$kendaraan->id}}"
                                        @if (isset($_GET['default']))
                                            {{strtolower($_GET['default'] )== strtolower($kendaraan->name) ? 'selected' : null}}
                                        @endif    
                                    >{{$kendaraan->name}}</option>
                                @endforeach
                            </select>
                      </div>
                      <div class="col">
                        <input name="no_polisi" type="text" class="form-control text-uppercase" placeholder="Nomor Polisi">
                      </div>
                      <div class="col-md-2">
                        <button type="submit" class="btn btn-block btn-success">Tambahkan</button>
                      </div>
                    </div>
                  </form>
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
                                    No Polisi
                                </th>
                                <th>
                                    Jenis Kendaraan
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Waktu Masuk
                                </th>
                            </tr>
                        </thead>
                        <tbody id="index_query">
                            @foreach ($parkir as $key => $item)    
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->no_polisi}}</td>
                                    <td>{{$item->jenis->name}}</td>
                                    <td>
                                        @switch($item->status)
                                            @case(false)
                                                <label class="badge badge-info">Parkir Masuk</label>
                                                @break
                                            @case(true)
                                                <label class="badge badge-success">Parkir Keluar</label>
                                                @break
                                            @default
                                                <label class="badge badge-danger">Error</label>
                                        @endswitch
                                    </td>
                                    <td>{{date('H:s / d M Y', strtotime($item->created_at))}}</td>
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