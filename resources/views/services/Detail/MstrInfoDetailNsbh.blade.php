@extends('adminlte::page')

@section('content')
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><strong> Master Info Detail Nasabah </strong></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table border table-hover">
                  @foreach($data as $row)
                  <tr>
                    <th>Nama</th>
                    <td>{{ $row->nama_nasabah }}</td>
                  </tr>
                  <tr>
                    <th>Rekening</th>
                    <td>{{ $row->account_nas }}</td>
                  </tr>
                  <tr>
                    <th>Contact</th>
                    <td>{{ $row->telp_a}}</td>
                  </tr>
                   <tr>
                    <th></th>
                    <td>{{ $row->telp_b }} </td>
                   </tr>
                  @endforeach  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
            <!-- /.card -->
      <!-- /.container-fluid -->
@endsection


