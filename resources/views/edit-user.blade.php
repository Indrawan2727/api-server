@extends('layouts.app')

@section('content')
<section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Role Register User</h3>
                </div>
                <div calss="card-body">
                           <form action="/updateuser/{{ $users->id }}" method="POST">
                               {{ csrf_field() }}    
                               {{ method_field('PUT') }}
                           <div class="form-group">
                               <div class="container">
                                   <label for="name">Nama</label>
                                   <input type="text" class="form-control" name="name" value="{{ $users-> name }}">
                                </div>
                                   <div class="form-group">
                                       <div class="container">
                                           <label for="level">Level</label>
                                           <select name="level" class="form-control" id="level">
                                               <option value="petugas">petugas</option>
                                               <option value="warga">warga</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="container">
                                                <button type="submit" class="btn btn-success">update</button>
                                            <a href="/user" class = "btn btn-danger">cancle</a>
                                        </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
