@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel User Baru</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                 <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">NO</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  @php $no = 0; @endphp
                  @foreach($listUser as $data)
                  @php $no++; @endphp
                  <tbody>
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->level}}</td>
                      <td><button type="button" class="btn btn-primary" data-id =" {{ $data->id }} " data-status =" {{ $data->level}} " data-toggle="modal" data-target="#exampleModal1" > VERIVIKASI </button>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
             <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verifikas Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="{{ route('user.update', 'test') }}" role="form" enctype="multipart/form-data">
              {{ csrf_field() }}    
               {{ method_field('PUT') }} 
                <div class="modal-body">
                  <input type= "hidden" name ="id" id="id" value=""></input>
                  <div class="form-group">
                  <label>Verifikas</label>
                  <select class="form-control" id="level" name="level" value="Pilih">
                  <option>Aktif</option>
                  <option>Non Aktif</option>
                  </select>
                  </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>

    </section>

    <!-- /.content -->
@endsection



