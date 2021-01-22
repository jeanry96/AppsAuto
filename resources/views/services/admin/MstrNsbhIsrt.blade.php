@extends('adminlte::page')
@section('content')
<!-- BASIC FORM VALIDATION -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-angle-right"></i><strong> FORM INPUT DATA NASABAH </strong></h3>
              </div>
            </div>
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
            <div class="card-body">
            <div class="form-panel">
              <form role="form" class="form-horizontal style-form" method="POST" action="{{ url('post/save/customer') }}">
                {{ csrf_field()}}
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Nama Lengkap</label>
                  <div class="col-lg-10">
                    <input type="text" name="member_name" placeholder="Input Nama Nasbah" id="f-name" class="form-control" required>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Rekening</label>
                  <div class="col-lg-10">
                    <input type="number" name="account_member" placeholder="Input Rekening Nasabah" id="f-name" class="form-control" reuired>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">No. HP/WA (1)</label>
                  <div class="col-lg-10">
                    <input type="text" name="hp_wa" placeholder="No HP / WA" id="f-name" class="form-control">
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">No. Telp (2)</label>
                  <div class="col-lg-10">
                    <input type="text" name="telp" placeholder="No Telp" id="f-name" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn btn-primary" type="submit">Save</button>
                    <button class="btn btn btn-danger" type="reset">Reset</button>
                    <a href="{{ url('add/account/autodebet') }}" class="btn btn btn-secondary">Back</a>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>

@endsection
