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
<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('keluar.store')}}">
                    @csrf
                    <div class="form-row">
                      <div class="col">
                        <input name="kode_parkir" required type="text" class="form-control text-uppercase" placeholder="Kode Parkir">
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
                                    Parkir Id
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
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection