@extends('services.home')

@section('content')
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa fa-angle-right"></i><strong> REPORT MASTER DATA AUTODEBET</strong></h3>
              </div>
            </div>
              <!-- /.card-header -->
              @if(count($errors) >0 )
            <div class="alert alert-danger">
              Validation error
              <ul>
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">X</button>
                      <li>{{ $error }}</li>
                  </div>
                @endforeach
              </ul>
            </div>
          @endif
          @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">X</button>
              <strong>{{ $message }}</strong>
            </div>
          @endif
            <div class="card">
              <div class="card-body">
                <table id="example2" class="table table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Nasabah</th>
                    <th>No. Rekening</th>
                    <th>Kode SCharge</th>
                    <th>Kode Listrik</th>
                    <th>No. Telp/Internet</th>
                    <th>Pilihan</th>
                  </tr>
                  </thead>                  
                  <tbody>
                  @foreach($test as $row)
                  <tr>
                    <td>{{ $row->id  }} </td>
                    <td>{{ $row->name  }}</td>
                    <td>{{ $row->email  }} </td>
                    <td>{{ $row->password  }} </td>
                    <td>{{ $row->role  }} </td>
                    <td>
                      <a href="" class="btn btn-info btn-xs fa fa-eye"><span> Detail</span></a>
                      <a href="" class="btn btn-primary btn-xs fa fa-plus-square"><span> Update</span></a>
                      <a href="" class="btn btn-danger btn-xs fa fa-trash-alt" onclick="return confirm('Anda yakin untuk menghapus data ini?');"><span> Delete </span></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
            <!-- /.card -->
      <!-- /.container-fluid -->
@endsection
