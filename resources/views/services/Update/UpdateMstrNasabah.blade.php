@extends('adminlte::page')

@section('content')
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Update Data Nasabah</h3>
              </div>
              @foreach($data as $row)
              <form method="post" action="{{ route('master.account.update',$row->id) }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" placeholder="Input Nama Nasabah" value="{{ $row->id }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Nasabah</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Input Nama Nasabah" value="{{ $row->nama_nasabah }}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">No. Rekening</label>
                    <input type="number" name="account" class="form-control" id="exampleInputPassword1" placeholder="Input No Rekening" value="{{ $row->account_nas }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NO. HP/WA</label>
                    <input type="text" name="contact1" class="form-control" id="exampleInputEmail1" placeholder="Input No HP atau WA" value="{{ $row->telp_a }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">No. Telp</label>
                    <input type="text" name="contact2" class="form-control" id="exampleInputPassword1" placeholder="Input No Rekening" value="{{ $row->telp_b }}">
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin untuk update data ini? ')">Submit</button>
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <a href="{{ route('master.account') }}" class="btn btn-secondary"> Back </a>
                </div>
              </form>
              @endforeach
            </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
@stop