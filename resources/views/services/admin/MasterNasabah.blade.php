@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/datatables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('css/cdn/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/cdn/buttons.dataTables.min.css') }}">    
@stop
@section('content')
          @if(count($errors) >0 )
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
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa fa-angle-right"></i><strong>MASTER DATA NASABAH</strong> (Total: <b>{{ $count }}</b> Accounts) 
                  <a href="{{ route('input.populate') }}" class="fas fa fa-plus-square"></a>
                  <a href="{{ route('export.nasabah.excel') }}" class="fas fa fa-file-excel"></a>
                </h3>
              </div>
            </div>
            <!--div class="card">
              <div class="card-header">
                <div class="form-panel">
                  <form class="form-inline " method="get" action="{{ route('master.account') }}">
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
            <div class="card">
              <div class="card-header">
                <table id="example2 table-datatables" class="table table-hover display example2">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Nasabah</th>
                    <th>No. Rekening</th>
                    <th>Kontak 1</th>
                    <th>Kontak 2</th>
                    <th>Pilihan</th>
                  </tr>
                  </thead>
                  @php 
                    $no = 1;
                  @endphp
                  
                  <tbody>
                  @foreach($account as $row)
                  <tr>
                    <td>{{ $row->id }} </td>
                    <td>{{ $row->account_nas}}</td>
                    <td>{{ $row->nama_nasabah }}</td>
                    <td>{{ $row->telp_a }}</td>
                    <td>{{ $row->telp_b }} </td>
                    <td>
                      <a href="{{ route('master.detail.info.nasabah', $row->id) }}" class="btn btn-info btn-xs fa fa-eye"></a> 
                      <a href="{{ url('master/account/edit',$row->id) }}" class="btn btn-primary btn-xs fa fa-edit"></a>
                      <a href="{{ url('master/account/delete',$row->id) }}" class="btn btn-danger btn-xs fa fa-trash-alt" onclick="return confirm('Yakin untuk menghapus data ini ?')"></a>
                    </td>
                  </tr>
                  @endforeach  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Nasabah</th>
                    <th>No. Rekening</th>
                    <th>Kontak 1</th>
                    <th>Kontak 2</th>
                    <th>Pilihan</th>
                  </tr>
                  </tfoot>
                </table>
                {{-- $account->links() --}}
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
            <!-- /.card -->
      <!-- /.container-fluid -->
@stop
@section('js')
    <script src="{{ asset('js/cdn/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/cdn/buttons.print.js') }}"></script>
    <script src="{{ asset('js/cdn/jszip.min.js') }}"></script>
    <script src="{{ asset('js/cdn/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/cdn/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/cdn/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('js/cdn/jquery.dataTables.min.js') }}"></script>
    
    <script type="text/javascript">
      $(document).ready(function()
      {
        var table = $('.example2').DataTable({
          buttons: ['copy','csv','excel','pdf','print'],
        });
      });
    </script>
@stop


