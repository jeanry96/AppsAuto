@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables-bs4/css/datatables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cdn/jquery.dataTables.min.css') }}">
@endsection

@section('content')
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><strong> Data Filter</strong> (Total: <b>{{ $count }}</b> Items)</h2>
              </div>
            </div>
              <!-- /.card-header -->
            <div class="card">
              <div class="card-body">
                <table id="example2 table-datatables" class="table table-hover example2">
                  <thead>
                  <tr>
                    <td>No</td>
                    <th>Kode</th>
                    <th>Rekening</th>
                    <th>Nominal (Rp)</th>
                    <th>Sign</th>
                    <th>Referensi</th>
                  </tr>
                  </thead>
                  @php 
                    $no = 1;
                  @endphp
                  <tbody>
                  @foreach($data1 as $row)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->jenis_kode }} </td>
                    <td>{{ $row->account_nas}} </td>
                    <td>{{ $row->nominal }}</td>
                    <td>{{ $row->signs }} </td>
                    <td>{{ $row->references }}-{!! \Illuminate\Support\Str::limit($row->nama_nasabah,7) !!}</td>
                  </tr>
                  @endforeach  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Account</th>
                    <th>Nominal (Rp)</th>
                    <th>Sign</th>
                    <th>Referensi</th>
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
@section('js')
  <script src="{{ asset('js/cdn/jquery-3.3.1.js') }}"></script>
  <script src="{{ asset('js/cdn/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      var table = $('.example2').DataTable();
    });
  </script>
@endsection