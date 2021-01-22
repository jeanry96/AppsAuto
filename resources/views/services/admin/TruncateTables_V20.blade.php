@extends('adminlte::page')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title"><strong><i class="fa fa-angle-right"></i> Remove Data Import & Filter </strong></h2>
        </div>
      </div>
      <!-- /.card-header -->
        @if(count($errors) > 0 )
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
        <div class="card-header">
          <table id="example2" class="table table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Keterangan</th>
              <th></th>
              <th></th>
              <th>Kode</th>
              <th></th>
              <th></th>
              <th></th>
              <th>Pilihan</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td> <strong><i class="fa fa-angle-right"></i></strong> </td>
              <td> Data ( Import <strong>{{ $totalDataImport }}</strong> & Filter <strong>{{ $totalDataFilter }}</strong> )  </td>
              <td>SCPR</td>
              <td>LSPR</td>
              <td>SCMM</td>
              <td>LSMM</td>
              <td>LSST</td>
              <td>TPMI</td>
              <td> 
                <i class="far fa fa-trash-alt"></i>
                <a href="{{ url('clr/all/import/filter/v20') }}" class="btn btn-danger btn-xs"> DELETE ALL </a>
              </td>
            </tr>
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
