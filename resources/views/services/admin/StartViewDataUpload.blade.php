@extends('adminlte::page')
@section('content')

<h3><i class="fa fa-angle-right"></i> Data Upload</h3><!-- FORM VALIDATION -->
<div class="row mt">
    <div class="col-lg-12">
      <!--h4><i class="fa fa-angle-right"></i></h4 -->
      <div class="form-panel">
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="get" action="">
            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2">Pilih Data</label>
              <div class="col-lg-10">
                <select class=" form-control" id="cname" name="name" minlength="2" required />
                    <option value="">All</option>
                    <option value="">SCPR</option>
                    <option value="">LSPR</option>
                    <option value="">SCST</option>
                    <option value="">LSST</option>
                    <option value="">SCMM</option>
                    <option value="">LSMM</option>
                    <option value="">TPMI</option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-info" type="submit">Display</button>
                <button class="btn btn-theme04" type="reset">Reset</button>
              </div>
            </div>
          </form>
        </div>

      </div>
      <!-- /form-panel -->
    </div>
    <!-- /col-lg-12 -->
    <div class="col-lg-12">
        <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                      <th></th>
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

                <tbody>
                  <tr class="gradeX">
                      <td></td>
                      <td><td>
                    <td></td>
                    <td class="hidden-phone"><td>
                    <td class="hidde-phone"></td>
                    <td class="hidden-phone"></td>
                  </tr>
                </tbody>

              </table>
            </div>
            {{-- $data->links() --}}
          </div>
          <!-- page end-->
    </div>
  </div>

@endsection
