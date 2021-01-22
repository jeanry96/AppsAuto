@extends('adminlte::page')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa fa-angle-right"></i><strong> FORM INPUT DATA AUTODEBET </strong></h3>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="form-panel">
        @foreach($data as $row)
          <form role="form" class="form-vertical" method="POST" action="{{ url('post/save/autodebet') }}">
            {{ csrf_field()}}
            {{ method_field('POST')}}
              <input type="hidden" value="{{ $row->id }}">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-group has-success">
                      <label class="col-lg control-label">Nama Lengkap</label>
                      <div class="col-xs">
                        <input type="text" name="member_name" placeholder="Input Nama Nasbah" id="f-name" class="form-control" value="{{ $row->nama_nasabah }}" disabled required>
                      </div>
                    </div>
                    <div class="form-group has-success">
                      <label class="col-lg control-label">Rekening</label>
                      <div class="col-xs">
                        <input type="number" name="account_member" placeholder="Input Rekening Nasabah" id="f-name" class="form-control" value="{{ $row->account_nas }}" reuired>
                      </div>
                    </div>
                    <div class="form-group has-success">
                      <label class="col-lg control-label">Kode SCharge</label>
                      <div class="col-xs">
                        <input type="text" name="kode_sc" placeholder="Kode Service Charge" id="f-name" class="form-control">
                      </div>
                    </div>
                    <div class="form-group has-success">
                      <label class="col-lg control-label">Kode Listrik</label>
                      <div class="col-xs">
                        <input type="text" name="kode_ls" placeholder="Kode Autodebet Listrik" id="f-name" class="form-control">
                      </div>
                    </div>
                    <div class="form-group has-success">
                      <label class="col-lg control-label">No. Telp/Internet</label>
                      <div class="col-xs">
                        <input type="text" name="kode_tlp" placeholder="No. Autodebet Telp/Internet" id="f-name" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn btn-primary" type="submit">Save</button>
                  <button class="btn btn btn-warning" type="reset">Reset</button>
                  <a href="{{ url('add/account/autodebet') }}" class="btn btn-secondary"> Back</a>
                </div>
              </div>
          </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection