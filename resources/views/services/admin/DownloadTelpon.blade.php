@extends('adminlte::page')

@section('content')
    <h3><i class="fa fa-angle-right"></i> Data <strong>Telpon</strong> To <strong>Excel</strong> (<u><strong>{{ $count }}</strong> Records</u>)</h3>
    <div class="row mb">
      <!-- page start-->
      <div class="content-panel">
        <div class="adv-table">
          <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
              <tr>
                <th>Kode</th>
                <th class="hidden-phone">Rekening</th>
                <th class="hidden-phone">Nominal</th>
                <th class="hidden-phone">Sign</th>
                <th>Referensi</th>
              </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $row)
            <tbody>
              <tr class="gradeX">
                  <td>{{ $no++ }}</td>
                  <td>{{ $row->kode_pengelola }}</td>
                <td>{{ $row->account }}</td>
                <td class="hidden-phone">{{ $row->total_tagihan }}</td>
                <td class="hidde-phone">{{ $row->sign }}</td>
                <td class="hidden-phone">{{ \Illuminate\Support\Str::limit($row->telpon.'/'.$row->nama_nasabah,15) }}</td>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
        {{-- $data->links() --}}
      </div>
      <!-- page end-->
    </div>
    <!-- /row -->

@endsection
