@extends('layouts.admin')
@section('body')
@include('layouts.components.messageAlert')
<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('laporan.create')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col col-lg-3">
                                <div class="form-group mb-0">
                                    <label>Dari Tanggal</label>
                                    <input required name="start_date" value="{{$start_date}}" type="date" max="{{date('Y-m-d')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col col-lg-3">
                                <div class="form-group mb-0">
                                    <label>Sampai Tanggal</label>
                                    <input required name="end_date" value="{{$end_date}}" max="{{date('Y-m-d')}}" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-0">
                                    <label>Aksi</label>
                                    <div class="row">
                                        <div class="col">
                                            <button name="_get" value="submit" type="submit" class="btn btn-block btn-primary">Submit</button>
                                        </div>
                                        <div class="col">
                                            <button name="_get" value="cetak" type="submit" class="btn btn-block btn-success">Cetak</button>
                                        </div>
                                        <div class="col">
                                            <button name="_get" value="excel" type="submit" class="btn btn-block btn-success">Export Excel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    Jenis Kendaraan
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
                            @foreach ($laporan as $key => $item)    
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$item['parkir']['kode_parkir']}}</td>
                                    <td>{{$item['parkir']['no_polisi']}}</td>
                                    <td>
                                        @if ($item['lama_parkir'] >= 60)
                                            {{floor($item['lama_parkir'] / 60)}} jam, {{($item['lama_parkir'] % 60)}} menit
                                        @else
                                            {{$item['lama_parkir']}} menit
                                        @endif
                                    </td>
                                    <td>{{$item['tarif']}}</td>
                                    <td>Rp {{number_format($item['tagihan'], 0,',',',')}}</td>
                                    <td>{{$item['parkir']['jenis']['name']}}</td>
                                    <td>{{$item['parkir']['created_at']}}</td>
                                    <td>{{$item['created_at']}}</td>
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