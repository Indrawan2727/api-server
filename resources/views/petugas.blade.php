@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Petugas</h1>
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
              <h3 class="card-title">Tabel Petugas</h3>
              <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Petugas</button>
            </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                 <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">NO</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  @php $no = 0; @endphp
                  @foreach($petugas as $data)
                  @php $no++ ; @endphp
                  <tbody>
                    <tr>
                      <td>{{$no }}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->level}}</td>
                      <td align="center">
                     <button type="button" class="btn btn-primary btn-sm" data-id =" {{ $data->id }} " data-status =" {{ $data->level}} " data-toggle="modal" data-target="#exampleModal13" > Edit </button>
                    <a href="/deletepetugas/{{ $data->id }}"  class="btn btn-danger btn-sm">Delete</a>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            
            </div>
             <div class="modal fade" id="exampleModal13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="{{ route('petugas.update', 'test') }}" role="form" enctype="multipart/form-data">
              {{ csrf_field() }}    
               {{ method_field('PUT') }} 
                <div class="modal-body">
                  <input type= "hidden" name ="id" id="id" value=""></input>
                  <div class="form-group">
                  <label>Edit</label>
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
        
         </div><!-- /.container-fluid -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form method="POST" action="{{ route('petugas.store') }}" role="form" enctype="multipart/form-data">
              @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="name" value="">
                  </div>
                  <div class="form-group">
                    <label>NIK/NIP</label>
                    <input type="number" class="form-control" placeholder="nik/nama" name="nik" value="">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="email" name="email" value="">
                  </div>
                  <div class="form-group">
                    <label>No Hp/phone</label>
                    <input type="number" class="form-control" placeholder="phone" name="phone" value="">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" placeholder="password" name="password" value="">
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

    <!-- /.content -->
@endsection



