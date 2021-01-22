@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables-bs4/css/datatables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cdn/jquery.dataTables.min.css') }}">
@stop
@section('content')
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><i class="fa fa-angle-right"></i> <strong> ADD DATA MASTER AUTODEBET <a href="{{ url('input/populate') }}" class="fas fa-fw fa-user-plus"></a></strong></h3>
                </div>
            </div>
            <!-- div class="card">
              <div class="card-body">
                <div class="form-panel">
                  <form class="form-inline " method="get" action="{{-- route('account.search') --}}">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="form-group has-success">
                          <input class="form-control" name="searching" id="f-name" type="search" placeholder="Search" value="{{-- old('searching') --}}" aria-label="Search">  
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
            @if(count($errors) >0 )
            <div class="alert alert-danger">
              Validation error
              <ul>
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert"> X </button>
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
              <table cellpadding="0" cellspacing="0" border="0" class="table table-hover example2" id="hidden-table-info">
              <thead>
                <tr>
                  <th>Id Nasabah</th>
                  <th>Account Nasabah</th>
                  <th>Nama Nasabah</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              @php
              @endphp
              <tbody>
              @foreach($cari as $row)
              <tr>
                <td class="center hidden-phone">{{ $row->id }}</td>
                <td class="center hidden-phone">{{ $row->account_nas }}</td>
                <td class="center hidden-phone">{{ $row->nama_nasabah }}</td>
                <td><a href="{{ url('master/insert/scls/telpon',$row->id) }}" class="btn btn-info btn-xs fa fa-plus-square"> Add To Autodebet </a></td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Id Nasbah</th>
                  <th>Account Nasabah</th>
                  <th>Nama Nasabah</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
            </table>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
@stop
@section('js')
  <script src="{{ asset('js/cdn/jquery-3.3.1.js') }}"></script>
  <script src="{{ asset('js/cdn/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function()
    {
      var table = $('.example2').DataTable();
    });
  </script>
@stop