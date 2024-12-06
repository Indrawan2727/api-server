@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Laporan Masuk</h1>
          </div><!-- /.col --><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

            <!-- /.card-header -->
            <div class="card-body p-0">
           <table class="table table-bordered">
                  <thead>                  
                    <tr>
                    <th style="width: 10px">NO</th>
                    <th>Nama</th>
                    <th>lokasi</th>
                    <th>kategori</th>
                    <th>Deskripsi</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php $no = 0; @endphp
                @foreach($listUser as $data)
                @php $no++; @endphp
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->lokasi }}</td>
                        <td>{{ $data->kategori}}</td>
                        <td>{{ $data->deskripsi}}</td>
                        <td><image height="130px" width="130px" src="{{asset('storage/laporan/'.$data -> image)}}"></td>
                        <td>{{ $data->status}}</td>
                        <td>
                        <button type="button" class="btn btn-block btn-success btn-xs" data-id =" {{ $data->id }} " data-status =" {{ $data->status}} " data-toggle="modal" data-target="#exampleModal2" > Verifikas </button>
                        <a href="/googlemap/{{ $data->id }}" target="_blank" class="btn btn-block btn-info btn-xs">Lihat Lokasi</a>
                     
                        <!--    /
                        <a href="#">
                            <i class="fa fa-trash red"></i>
                        </a>-->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
