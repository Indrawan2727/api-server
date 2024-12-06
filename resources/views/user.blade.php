@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel User</h1>
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
                      <th>Action</th>
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
                      <td>
                      <a href="/deleteuser/{{ $data->id }}"  class="btn btn-block btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

    </section>

    <!-- /.content -->
@endsection



