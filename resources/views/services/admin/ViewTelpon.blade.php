@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables-bs4/css/datatables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cdn/jquery.dataTables.min.css') }}">
@stop
@section('content')
    <div class="row">
      <!-- page start-->
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">
              <h5><i class="fa fa-angle-right"></i> Data Upload <strong>Telpon</strong> ( <u><strong>{{$count}}</strong> Records</u> )</h5>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <table class="table table-hover disply example2" id="example2 table-datatables hidden-table-info">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Sign</th>
                  <th class="hidden-phone">No. Telpon/Internet</th>
                  <th class="hidden-phone">Jml Tagihan (Rp)</th>
                </tr>
              </thead>
              @php
                  $no = 1;
              @endphp
              <tbody>
              @foreach ($data as $row)
                <tr class="gradeX">
                  <td>{{ $no++ }}</a></td>
                  <td>{{$row->kode}}</td>
                  <td class="hidden-phone">{{ $row->sign }}</td>
                  <td class="hidden-phone">{{ $row->pstn }}</td>
                  <td class="hidden-phone">{{ $row->tagihan }}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Sign</th>
                  <th>No. Telpon/Internet</th>
                  <th>Jml Tagihan</th>
                </tr>
              </tfoot>
            </table>
          </div>
          {{-- $data->links() --}}
        </div>
        <!-- page end -->
      </div>
    <!-- /row -->
    </div>
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