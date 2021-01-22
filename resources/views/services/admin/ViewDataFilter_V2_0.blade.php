@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables-bs4/css/datatables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cdn/jquery.dataTables.min.css') }}">
@stop
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title"><strong> Data Filter</strong> (Total: <b>{{ $count }}</b> Items)</h2>
      </div>
    </div>
    <!-- div class="card">
      <div class="card-body">
        <div class="form-panel">
          <form class="form-inline " method="get" action="{{-- route('display.data.filter.v2.0') --}}">
            {{ csrf_field() }}
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-group has-success">
                  <input class="form-control" name="search" id="f-name" type="search" placeholder="Search" value="{{ old('search') }}" aria-label="Search">  
                    <div class="input-group-append">
                        <button class="btn btn-search" type="submit">
                            <i class="fas fa fa-search"></i>
                        </button>
                    </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div -->
      <!-- /.card-header -->
    <div class="card">
      <div class="card-header">
        <table id="example2 table-datatables" class="table table-hover disply example2">
          <thead>
          <tr>
            <th>No</th>
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
          @foreach($data as $row)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->kode }} </td>
            <td>{{ $row->account_nas}} </td>
            <td>{{ $row->nominal }}</td>
            <td>{{ $row->sign }} </td>
            <td>{{ $row->referensi }}-{!! \Illuminate\Support\Str::limit($row->nama_nasabah,7) !!}</td>
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
      <div class="card-footer">
      </div>
    </div>
  </div>
</div>
    <!-- /.card -->
<!-- /.container-fluid -->
@stop

@section('js')
  <script src="{{ asset('js/cdn/jquery-3.3.1.js') }}"></script>
  <script src="{{ asset('js/cdn/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      var table = $('.example2').DataTable();
    });
  </script>
@stop
