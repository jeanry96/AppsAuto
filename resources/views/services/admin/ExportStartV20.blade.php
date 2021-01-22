@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><strong>Export Data Autodebet To Excel</strong></h3>
        </div>
      </div>
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Keterangan</th>
              <th></th>
              <th>Record</th>
              <th>Pilihan</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td> 1. </td>
              <td> Data Autodebet Listrik <strong>(LSMM, LSPR, LSST)</strong> </td>
              <td> </td>
              <td> {{ $countAllLS }}</td>
              <td> 
                  <a href="{{ url('detail/data/all/listrik/to/export') }}" class="btn btn-info btn-xs fa fa-eye"> Detail </a>
                  <a href="{{ url('export/excel/all/ls') }}" class="btn btn-primary btn-xs fa fa-file-excel"> EXPORT All LS</a>
              </td>
            </tr>
            <tr>
              <td> 2. </td>
              <td> Data Autodebet Service Charge <strong>(SCMM, SCPR, SCST)</strong> </td>
              <td> </td>
              <td> {{ $countAllSC }} </td>
              <td> 
                <a href="{{ url('detail/data/all/service/to/export') }}" class="btn btn-info btn-xs fa fa-eye"> Detail </a>
                <a href="{{ url('export/excel/all/sc') }}" class="btn btn-primary btn-xs fa fa-file-excel"> EXPORT All SC</a>
              </td>
            </tr>
            <tr>
              <td> 3. </td>
              <td> Data Autodebet Telpon <strong>( TPMI )</strong> </td>
              <td> </td>
              <td> {{ $countAllTPMI }} </td>
              <td> 
                <a href="{{ url('detail/data/telpon/to/export') }}" class="btn btn-info btn-xs fa fa-eye"> Detail </a>
                <a href="{{ url('export/excel/telpon') }}" class="btn btn-primary btn-xs fa fa-file-excel"> EXPORT Telp</a>
              </td>
            </tr>
            </tbody>
            <tfoot>
              <tr>
                <th></th>
                <th><strong>TOTAL RECORDS</strong></th>
                <th></th>
                <th><strong> {{ $SUM }} </strong></th>
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
