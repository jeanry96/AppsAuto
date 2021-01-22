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
              <th>Kode</th>
              <th>Nama Pegelola</th>
              <th>Record</th>
              <th>Pilihan</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($scpr as $row)
            <tr>
              <td> {{ $row->id_p }}</td>
              <td> {{ $row->kode_pengelola }}</td>
              <td> {{ $row->nama_nasabah }}</td>
              <td> {{ $countSCPR }}</td>
              <td> 
                  <a href="" class="btn btn-info btn-xs fa fa-eye"> Detail </a>
                  <a href="{{ url('export-sc-scpr') }}" class="btn btn-primary btn-xs fa fa-file-excel"> EXPORT</a>
              </td>
            </tr>
            @endforeach
            @foreach ($lspr as $row)
            <tr>
              <td> {{ $row->id_p }}</td>
              <td> {{ $row->kode_pengelola }}</td>
              <td> {{ $row->nama_nasabah }}</td>
              <td> {{ $countLSPR }} </td>
              <td> 
                <a href="" class="btn btn-info btn-xs fa fa-eye"> Detail </a>
                <a href="{{ url('export-ls-lspr') }}" class="btn btn-primary btn-xs fa fa-file-excel"> EXPORT</a>
              </td>
            </tr>
            @endforeach
            @foreach ($scst as $row)
            <tr>
              <td> {{ $row->id_p }}</td>
              <td> {{ $row->kode_pengelola }}</td>
              <td> {{ $row->nama_nasabah }}</td>
              <td> {{ $countSCST }}</td>
              <td> 
                <a href="" class="btn btn-info btn-xs fa fa-eye"> Detail </a>
                <a href="{{ url('export-sc-scst') }}" class="btn btn-primary btn-xs fa fa-file-excel"> EXPORT</a>
              </td>
            </tr>
            @endforeach
            @foreach ($lsst as $row)
            <tr>
              <td> {{ $row->id_p }}</td>
              <td> {{ $row->kode_pengelola }}</td>
              <td> {{ $row->nama_nasabah }}</td>
              <td> {{ $countLSST }}</td>
              <td> 
                <a href="" class="btn btn-info btn-xs fa fa-eye"> Detail </a>
                <a href="{{ url('export-ls-lsst') }}" class="btn btn-primary btn-xs fa fa-file-excel"> EXPORT</a>
              </td>
            </tr>
            @endforeach
            @foreach ($scmm as $row)
            <tr>
              <td> {{ $row->id_p }}</td>
              <td> {{ $row->kode_pengelola }}</td>
              <td> {{ $row->nama_nasabah }}</td>
              <td> {{ $countSCMM }}</td>
              <td> 
                <a href="{{ url('data-scmm-to-export') }}" class="btn btn-info btn-xs fa fa-eye"> Detail </a>
                <a href="{{ url('export-sc-scmm') }}" class="btn btn-primary btn-xs fa fa-file-excel"> EXPORT</a>
              </td>
            </tr>
            @endforeach
            @foreach ($lsmm as $row)
            <tr>
              <td> {{ $row->id_p }}</td>
              <td> {{ $row->kode_pengelola }}</td>
              <td> {{ $row->nama_nasabah }}</td>
              <td> {{ $countLSMM }}</td>
              <td> 
                <a href="{{ route('data.lsmm.to.export') }}" class="btn btn-info btn-xs fa fa-eye"> Detail </a>
                <a href="{{ url('export-ls-lsmm') }}" class="btn btn-primary btn-xs fa fa-file-excel"> EXPORT</a>
              </td>
            </tr>
            @endforeach
            @foreach ($tpmi as $row)
            <tr>
              <td> {{ $row->id_p }}</td>
              <td> {{ $row->kode_pengelola }}</td>
              <td> {{ $row->nama_nasabah }}</td>
              <td> {{ $countTPMI }}</td>
              <td> 
                <a href="{{ url('data-tpmi-to-export') }}" class="btn btn-info btn-xs fa fa-eye"> Details </a>
                <a href="{{ url('export-telp-tpmi') }}" class="btn btn-primary btn-xs fa fa-file-excel"> EXPORT</a>
              </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th></th>
                <th></th>
                <th><strong>TOTAL RECORDS</strong></th>
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
