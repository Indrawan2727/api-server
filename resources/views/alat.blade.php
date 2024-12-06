@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Alat Damkar</h1>
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

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Alat-Alat Damkar</h3>
              <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Add item</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <table class="table table-bordered">
                  <thead>                  
                    <tr>
                    <th style="width: 10px">NO</th>
                    <th style="width: 130px">Nama</th>
                    <th style="width: 30px">Image</th>
                    <th>Deskripsi</th>
                    <th style="width: 10px">Jumlah</th>
                    <th style="width: 15px">Action</th>
                    </tr>
                  </thead>
                <tbody>
                @php $no = 0; @endphp
                @php $no++; @endphp
                @foreach($listAlat as $data)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $data->name }}</td>
                        <td><image height="100px" src="{{asset('storage/laporan/'.$data -> image)}}"></td>
                        <td>{{ $data->deskripsi}}</td>
                        <td>{{ $data->jumlah}}</td>
                        <td>
                        <!--  <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal2">
                              <i class="fas fa-pencil-alt"> fa fa-trash red
                              </i>
                              Verifikas
                          </a>-->
                          <button type="button" class="btn btn-primary" data-id =" {{ $data->id }} " data-status =" {{ $data->status}} " data-toggle="modal" data-target="#exampleModal12" > edit </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>


        <div class="modal fade" id="exampleModal12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verifikas Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="{{  route('alat.update', 'test') }}" role="form" enctype="multipart/form-data">
              {{ csrf_field() }}    
               {{ method_field('PUT') }} 
                <div class="modal-body">
                  <input type= "hidden" name ="id" id="id" value=""></input>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" placeholder="Jumlah" name="jumlah" value="">
                  </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>


        
 
        </div><!-- /.container-fluid -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form method="POST" action="{{ route('alat.store') }}" role="form" enctype="multipart/form-data">
              @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="name" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File Gambar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi" value="">
                  </div>

                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" placeholder="Jumlah" name="jumlah" value="">
                  </div>
                <!-- /.card-body -->

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>


    </section>

    @endsection