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
            <div class="card-title">
              <h5><i class="fa fa-angle-right"></i> Data Import <strong>SC & LS ( {{ ($count) }} Records) </strong> <strong ><a href="{{url('filtering-data-v1-0')}}" class="fas fa fa-filter"> Filter Data Now</a></strong></h5>
            </div>
          </div>
        </div>
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
            <table cellpadding="0" cellspacing="0" border="0" class="table table-hover disply example2" id="hidden-table-info">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Sign</th>
                  <th>Lantai</th>
                  <th>Kios</th>
                  <th>Tagihan</th>
                </tr>
              </thead>
              <tbody>
              @php
                $no = 1;
              @endphp
              @foreach($data as $scls)
              <tr class="gradeX">
                <td class="center hidden-phone">{{$no++}}</td>
                <td class="center hidden-phone">{{$scls->kode}}</td>
                <td class="center hidden-phone">{{$scls->sign}}</td>
                <td class="center hidden-phone">{{$scls->lantai}}</td>
                <td class="center hidden-phone">{{$scls->kios}}</td>
                <td class="center hidden-phone">{{$scls->tagihan}}</td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Sign</th>
                  <th>Lantai</th>
                  <th>Kios</th>
                  <th>Tagihan</th>
                </tr>
              </tfoot>
            </table>
          </div> 
        </div>
      </div>
      <!-- page end-->
    </div>
    <!-- /row -->
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
