@extends('adminlte::page')

@section('content')
    <h3><i class="fa fa-angle-right"></i> Data Upload <strong>Telpon</strong> </h3>
    <div class="row mb">
      <!-- page start-->
      <div class="content-panel">
        <div class="adv-table">
          <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Listrik</th>
                <th class="hidden-phone">Nama</th>
                <th class="hidden-phone">Lantai</th>
                <th class="hidden-phone">Kios</th>
                <th>Tanggal Beban</th>
                <th>Nominal Taginah</th>
              </tr>
            </thead>
            <tbody>
              <tr class="gradeX">
                <td>1</td>
                <td>TPMI</td>
                <td class="hidden-phone">Win 95+</td>
                <td class="center hidden-phone">4</td>
                <td class="center hidden-phone">X</td>
                <td class="hidden-phone">Y</td>
                <td class="hidden-phone">Z</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- page end-->
    </div>
    <!-- /row -->

@endsection
