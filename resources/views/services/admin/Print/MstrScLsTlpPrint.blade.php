@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables-bs4/css/datatables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cdn/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cdn/bootstrap.min.css') }}">
@stop
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa fa-angle-right"></i><strong>MASTER DATA AUTODEBET</strong> (Total: <b>{{ $count }}</b> Records) 
          <a href="" class="fas fa fa-print" onclick="window.print()"></a>
        </h3>
      </div>
    </div>
      <!-- /.card-header -->
    <div class="card">
      <div class="card-header">
        <table id="example2 table-datatables" class="table table-hover disply example2" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Rekening</th>
              <th>Nama Nasabah</th>
              <th>Kode SCharge</th>
              <th>Kode Listrik</th>
              <th>Telp/Internet</th>
            </tr>
          </thead>
          @php
            $no = 1;
          @endphp
          <tbody>
          @foreach($data as $row)
            <tr>
              <td>{{ $row->account }} </td>
              <td>{{ $row->nama_nasabah }}</td>
              <td>{{ $row->sc }} </td>
              <td>{{ $row->ls }} </td>
              <td>{{ $row->telpon }} </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
    <!-- /.card -->
<!-- /.container-fluid -->
@endsection
@section('js')

<script src="{{ asset('js/cdn/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/cdn/jquery.dataTables.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function () {
    var table = $('.example2').DataTable();
  });
</script>
@endsection
