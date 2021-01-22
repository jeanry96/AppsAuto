@extends('adminlte::page')

@section('content')
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><strong>Info Detail Profile User </strong></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table border table-hover">
                  @foreach($data as $row)
                  <tr>
                    <th>Id</th>
                    <td>{{ $row->id }}</td>
                  </tr>
                  <tr>
                    <th>Nama Lengkap</th>
                    <td>{{ $row->name }}</td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>{{ $row->email}}</td>
                  </tr>
                   <tr>
                    <th>Status</th>
                    <td>{{ $row->role}}</td>
                  @endforeach  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
            <!-- /.card -->
      <!-- /.container-fluid -->
@stop
