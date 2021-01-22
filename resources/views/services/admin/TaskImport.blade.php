@extends('adminlte::page')

@section('content')
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title"><strong> Choose Task Import Data Excel </strong></h2>
          </div>
        </div>
          <!-- /.card-header -->
        <div class="card">
          <div class="card-body">
            <table id="example2" class="table table-hover">
              <thead>
              <tr>
                <th></th>
                <th>Keterangan</th>
                <th>Pilihan</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td></td>
                <td>Import Data Service Charge & Listrik (Excel)</td>                   
                <td>
                    <a href="{{ url('new/scls') }}" class="btn btn-primary btn-xs fa fa-file-excel"> NEW IMPORT SC  &  LS</a>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>Import Data Telpon (Excel)</td>                   
                <td>
                    <a href="{{ url('new/telpon') }}" class="btn btn-success btn-xs fa fa-file-excel"> NEW IMPORT TELPON</a>
                </td>
              </tr>
              </tbody>
              <tfoot>
              <tr>
                <th></th>
                <th>Keterangan</th>
                <th>Pilihan</th>
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
@stop
