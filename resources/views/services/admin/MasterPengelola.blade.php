@extends('adminlte::page')
@section('title', 'Pengelola')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables-bs4/css/datatables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cdn/jquery.dataTables.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa fa-angle-right"></i> <strong> MASTER DATA PENGELOLA </strong> (Total: <b> {{ $count }}</b> Kode)</h3>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <table class="display table table-hover" id="example2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th class="hidden-phone">Account</th>
                                <th class="hidden-phone">Nama Pengelola</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        @foreach ($pengelola as $row)
                        <tbody>
                            <tr>
                                <td>{{ $row->id_p }}</td>
                                <td>{{ $row->kode_pengelola }}</td>
                                <td>{{ $row->account }}</td>
                                <td>{{ $row->nama_nasabah }}</td>
                                <td>{{ $row->keterangan }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/cdn/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('js/cdn/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/cdn/dataTables.buttons.min.js') }}"></script>
    
    <script type="text/javascript">
      $(document).ready(function()
      {
        var table = $('.example2').DataTable({
          buttons: ['copy','csv','excel','pdf','print']
        });
      });
    </script>
@endsection