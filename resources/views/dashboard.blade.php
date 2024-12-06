@extends('layouts.chart')

@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
       
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
          <a href="{{ url('usermasuk') }}">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Warga</span>
                <span class="info-box-number">{{$users}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
          <a href="{{ url('petugas') }}">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Petugas</span>
                <span class="info-box-number">{{$petugass}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          </a>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
          <a href="{{ url('laporanmasuk') }}">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" >Laporan</span>
                <span class="info-box-number">{{$laporans}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </a>
          <!-- /.col -->
          <!-- /.col -->
        </div>

        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
             <!-- DONUT CHART -->
             <div class="card card-danger">
              <div class="card-header">
              <h3 class="card-title">Stacked Bar Chart</h3>


</div>
<div class="card-body">
<div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 334px;" width="334" height="250" class="chartjs-render-monitor"></canvas>
</div>
</div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <!-- STACKED BAR CHART -->
            <div class="card card-danger">
              <div class="card-header">
              <h3 class="card-title">Donut Chart</h3>


</div>
<div class="card-body">
<canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>




                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              
        
    </section>
    <!-- /.content -->
    <!-- ChartJS -->


@endsection

