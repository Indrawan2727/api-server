@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Laporan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card">
            <div class="card-header">
              <div class="input-group mb-3">
                <label for="label">Tanggal Awal</label>
                <div class="input-group mb-1">
                <input type="date" name="tglawal" id="tglawal" class="form-control col-sm-4" />
              </div>
              </div>
              <div class="input-group mb-3">
                <label for="label">Tanggal Akhir</label>
                <div class="input-group mb-1">
                <input type="date" name="tglakhir" id="tglakhir" class="form-control col-sm-4" />
                </div>
              </div>
              <a href="" onclick="this.href='/cetak-laporan/'+ document.getElementById('tglawal').value +'/'+  document.getElementById('tglakhir').value" 
              target="_blank" class="btn btn-primary">Cetak Data<i class="fas fa-print"></i></a>
            </div>
          </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
           <table class="table table-bordered">
                  <thead>                  
                    <tr>
                    <th style="width: 10px">NO</th>
                    <th style="width: 130px">Nama</th>
                    <th>lokasi</th>
                    <th style="width: 30px">kategori</th>
                    <th>Deskripsi</th>
                    <th style="width: 35px">Tanggal</th>
                    <th style="width: 30px">Image</th>
                    <th style="width: 20px">Status</th>
                    </tr>
                </thead>
                <tbody>
                @php $no = 0; @endphp
                @foreach($laporan as $index => $data)
                 @php $no++; @endphp
                    <tr>
                        <td scoop="row">{{ $index + $laporan->firstItem() }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->lokasi }}</td>
                        <td>{{ $data->kategori}}</td>
                        <td>{{ $data->deskripsi}}</td>
                        <td>{{  date('d F Y', strtotime ($data->created_at))}}</td>
                        <td><image height="130px" width="130px" src="{{asset('storage/laporan/'.$data -> image)}}"></td>
                        <td>{{ $data->status}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
              <p> </p>
            </div>
           <div class =" float-sm-right">
           {{$laporan->links()}}
           </div>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verifikas Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="{{ route('laporan.update', 'test') }}" role="form" enctype="multipart/form-data">
              {{ csrf_field() }}    
               {{ method_field('PUT') }} 
                <div class="modal-body">
                  <input type= "hidden" name ="id" id="id" value=""></input>
                  <div class="form-group">
                  <label>Verifikas</label>
                  <select class="form-control" id="status" name="status">
                  <option>Terima</option>
                  <option>Tolak</option>
                  </select>
                  </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
