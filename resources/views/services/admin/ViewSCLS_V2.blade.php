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
              <h5><i class="fa fa-angle-right"></i> Data Import <strong>SC & LS ( {{ ($count) }} Records) </strong> <strong ><a href="{{ url('filtering-data-v2-0')}}" class="fas fa fa-filter"> Filter Data Now</a></strong></h5>
            </div>
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
        @if(count($errors) > 0 )
        <div class="alert alert-danger">
          Validation error
          <ul>
            @foreach($errors->all() as $error)
              <div class="alert alert-danger alert-block">
              <button type="type" class="close" data-dismiss="alert">X</button>
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
                  <th>Block</th>
                  <th>Kios</th>
                  <th>Tagihan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              @php
                $no = 1;
              @endphp
              @foreach($selects as $scls)
              <tr class="gradeX">
                <td class="">{{ $scls->id }}</td>
                <td class="">{{ $scls->kode }}</td>
                <td class="">{{ $scls->sign }}</td>
                <td class="">{{ $scls->floor }}</td>
                <td class="">{{ $scls->block }}</td>
                <td class="">{{ $scls->kios }}</td>
                <td class="">{{ $scls->tagihan }}</td>
                <td><a href="{{ url('import/edit', $scls->id) }}" class="btn btn-info btn-xs fa fa-edit"> Edit </a></td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Sign</th>
                  <th>Lantai</th>
                  <th>Block</th>
                  <th>Kios</th>
                  <th>Tagihan</th>
                  <th>Aksi</th>
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
