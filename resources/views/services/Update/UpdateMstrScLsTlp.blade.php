@extends('adminlte::page')

@section('content')
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Update Master Autodebet</h3>
              </div>
              @foreach($data as $row)
              <form method="post" action="{{ route('master.debet.update',$row->id_sc_ls_tlp) }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" placeholder="Input Nama Nasabah" value="{{ $row->id_sc_ls_tlp }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Nasabah</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Input Nama Nasabah" value="{{ $row->nama_nasabah }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">No. Rekening</label>
                    <input type="number" name="account" class="form-control" id="exampleInputPassword1" placeholder="Input No Rekening" value="{{ $row->account_nas }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Service Charge</label>
                    <input type="text" name="kodeSC" class="form-control" id="exampleInputEmail1" placeholder="Input Kode Service Charge" value="{{ $row->sc }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kode Listrik</label>
                    <input type="text" name="kodeLS" class="form-control" id="exampleInputPassword1" placeholder="Input Kode Listrik" value="{{ $row->ls }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">No. Telpon/Internet</label>
                    <input type="text" name="pstn" class="form-control" id="exampleInputPassword1" placeholder="Input No Telp or Internet" value="{{ $row->telpon }}">
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin untuk update data ini? ')">Submit</button>
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <a href="{{ url('mstr-sc-ls-tlp') }}" class="btn btn-secondary"> Back </a>
                </div>
              </form>
              @endforeach
            </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
@endsection