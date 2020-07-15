@extends('layouts.admin')
@section('body')
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-crop-free text-danger icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Parkir Masuk</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">{{$parkir_masuk}}</h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> {{$today}}
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-barcode-scan text-warning icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Parkir Keluar</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">{{$parkir_keluar}}</h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> {{$today}}
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi mdi-car-child-seat text-success icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Jenis Kendaraan</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">{{$jenis_kendaraan}}</h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Semua Jenis Kendaraan
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi mdi-badge-account-horizontal-outline text-info icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Karyawan</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">{{$karyawan}}</h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Semua Karyawan
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection