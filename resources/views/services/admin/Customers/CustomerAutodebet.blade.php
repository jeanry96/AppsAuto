@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables-bs4/css/datatables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cdn/jquery.dataTables.min.css') }}">
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous" -->
@stop
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa fa-angle-right"></i><strong> Customers Autodebet Information</strong> (Total: <b>{{ $count }}</b> Autodebet)
        </h3>
      </div>
    </div>
      <!-- /.card-header -->
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
    <!-- div class="card">
      <div class="card-body">
        <div class="form-panel">
          <form class="form-inline " method="get" action="{{-- route('master.scls.telp') --}}">
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
        <table id="example2 table-datatables" class="table table-hover example2" cellspacing="0">
          <thead>
          <tr>
            <th>No Urut</th>
            <th>Rekening</th>
            <th>Nama Nasabah</th>
            <th>Kode Service Charge</th>
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
            <td>{{ $no++ }} </td>
            <td>{{ $row->account_nas}} </td>
            <td>{{ $row->nama_nasabah }}</td>
            <td>{{ $row->sc }} </td>
            <td>{{ $row->ls }} </td>
            <td>{{ $row->telpon }} </td>
          </tr>
          @endforeach  
          </tbody>
          <tfoot>
          <tr>
            <th>No. Urut</th>
            <th>Rekening</th>
            <th>Nama Nasabah</th>
            <th>Kode Service Charge</th>
            <th>Kode Listrik</th>
            <th>Telp/Internet</th>
          </tr>
          </tfoot>
        </table>
        {{-- $mstrsclstlp->links() --}}
      </div>
      <!-- /.card-body -->
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
    $(document).ready(function()
    {
      $('.example2').DataTable();
    });
  </script>
  <script>
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var recipient = button.data('isi');
    var modal = $(this);

    modal.find('.modal-body input').val(recipient);
  });
  </script>

<!-- script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script -->
@stop

