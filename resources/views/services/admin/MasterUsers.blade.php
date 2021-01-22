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
                <h3 class="card-title"><i class="fas fa fa-angle-right"></i> <strong>MASTER DATA USERS</strong> (Total: <b>{{ $count }}</b> Users)</h3>
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
            <div class="card">
              <div class="card-header">
                <table id="example2" class="table table-hover example2">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Users</th>
                    <th>E-Mail</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Pilihan</th>
                  </tr>
                  </thead>
                  @foreach($data as $row)
                  <tbody>
                  <tr>
                    <td>{{ $row->id }} </td>
                    <td>{{ $row->name }} </td>
                    <td>{{ $row->email }} </td>
                    <td>{{ $row->password }}</td>
                    <td>{{ $row->role }}</td>
                    <td>
                    <!-- input data-id="$row->id" class="toggle-class btn btn-xs" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Enable" data-off="Disable" {{ $row->role ? 'checked' : '' }} -->
                      <a href="" class="btn btn-success btn-xs fa fa-edit"> Ubah </a> 
                      <a href="" class="btn btn-danger btn-xs fa fa-trash-alt"> Hapus </a>
                    </td>
                  </tr>
                  </tbody>
                  @endforeach 
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Users</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Pilihan</th>
                  </tr>
                  </tfoot>
                </table>
                {{-- $data->links() --}}
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
            <!-- /.card -->
      <!-- /.container-fluid -->

      <!-- https://www.nicesnippets.com/blog/how-to-active-and-inactive-status-in-laravel-76 -->
@endsection
@section('js')
  <script src="{{ asset('js/cdn/jquery-3.3.1.js') }}"></script>
  <script src="{{ asset('js/cdn/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript">
      $(document).ready(function()
      {
        $('#example2').DataTable();
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
@stop
