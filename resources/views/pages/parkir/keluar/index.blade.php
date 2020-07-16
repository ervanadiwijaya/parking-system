@extends('layouts.admin')
@section('body')
<div class="content-header d-flex flex-column flex-md-row mb-3">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item active" aria-current="page">Data kendaraan keluar</li>
            </ol>
        </nav>
    </div>
</div>
@include('layouts.components.messageAlert')
<div style="display: none" id="alert_error" class="alert alert-danger" role="alert">
    <p class="mb-0">Terjadi kesalahaan</p>
</div>
<div style="display: none" id="alert_already_exist" class="alert alert-danger" role="alert">
    <p class="mb-0">Data sudah ada</p>
</div>
<div style="display: none" id="alert_success_added" class="alert alert-primary" role="alert">
    <p class="mb-0">Data berhasil ditambahkan</p>
</div>
<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div id="BarcodeScanner" class="col">
                        
                    </div>
                    <script src="{{ asset('js/app.js') }}"></script>
                    <div class="col">
                        <form method="POST" action="{{route('keluar.store')}}">
                            @csrf
                            <div class="form-group">
                                <label>Kode Parkir</label>
                                <input name="kode_parkir" required type="text" class="form-control text-uppercase" placeholder="Kode Parkir">
                            </div>
                            <button type="submit" class="btn btn-block btn-success">Tambahkan</button>
                          </form>
                    </div>
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
                                    Kode Parkir
                                </th>
                                <th>
                                    No Polisi
                                </th>
                                <th>
                                    Lama Parkir
                                </th>
                                <th>
                                    Tarif / Jam
                                </th>
                                <th>
                                    Tagihan
                                </th>
                                <th>
                                    Waktu Masuk
                                </th>
                                <th>
                                    Waktu Keluar
                                </th>
                            </tr>
                        </thead>
                        <tbody id="index_query">
                            @foreach ($transaksi as $key => $item)    
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$item->parkir->kode_parkir}}</td>
                                    <td>{{$item->parkir->no_polisi}}</td>
                                    <td>
                                        @if ($item->lama_parkir >= 60)
                                            {{floor($item->lama_parkir / 60)}} jam, {{($item->lama_parkir % 60)}} menit
                                        @else
                                            {{$item->lama_parkir}} menit
                                        @endif
                                    </td>
                                    <td>{{$item->tarif}}</td>
                                    <td>Rp {{number_format($item->tagihan, 0,',',',')}}</td>
                                    <td>{{$item->parkir->created_at}}</td>
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