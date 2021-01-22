@extends('adminlte::page')

@section('content')
<h3><i class="fa fa-angle-right"></i> Master Data <strong>Autodebet</strong> Telpon (<u><strong>{{ $count }}</strong> Records</u>)</h3>
<div class="row mb">
  <!-- page start-->
  <div class="content-panel">
    <div class="adv-table">
      <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
        <thead>
          <tr>
            <th>No</th>
            <th class="hidden-phone">Nama Nasbah</th>
            <th class="hidden-phone">Rekening</th>
            <th class="hidden-phone">Nomor Telpon</th>
          </tr>
        </thead>
        @php
            $no = 1;
        @endphp
         @foreach($telpon as $row)
        <tbody>
          <tr class="gradeX">
            <td class="hidden-phone">{{ $row->id }}</td>
            <td class="hidden-phone">{{ $row->nama_nasabah }}</td>
            <td class="hidden-phone">{{ $row->account }}</td>
            <td class="center hidden-phone">{{ $row->telpon }}</td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
    {{ $telpon->links() }}
  </div>
  <!-- page end-->
@endsection
