@extends('layouts.admin')
@section('body')
<div class="row mb-3">
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
<div class="row">
  <div class="col grid-margin stretch-card">
    <div class="card">
      <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <h4 class="card-title">Statistik Parkir Bulanan {{date('Y')}}</h4>
        <canvas id="myChart" class="chartjs-render-monitor"></canvas>
      </div>
    </div>
  </div>
</div>

<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  $.get('/chart/parkir', function(data, status){
    if (status == 'success') {
      let dData = [];

      data.data.forEach(element => {
        dData.push({
          label: element.label,
          data: element.data,
          fill: false,
          borderColor: element.borderColor,
          backgroundColor: false,
          borderWidth: 2
        })
      });

      var myChart = new Chart(ctx, {
        type: 'line',
        options: {
          responsive: true,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true,
                      stepSize: 20,
                  }
              }],
              xAxes: [{
                gridLines: {
                  drawBorder: false,
                }
              }]
          }
        },
        data: {
          labels: data.labels,
          datasets: dData
        },
      });
    }
  });
  
  </script>
@endsection