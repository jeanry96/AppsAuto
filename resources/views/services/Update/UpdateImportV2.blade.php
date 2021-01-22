@extends('adminlte::page')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/css/select2.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('pulgins/select2/css/select2.min.css') }}">
@endsection
@section('content')
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card car-default card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Update Data Import</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              @foreach($data as $row)
              <form method="post" action="{{ route('import.update',$row->id) }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Id</label>
                        <input type="text" style="width:100%;" name="id" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $row->id }}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Kode</label>
                        <input type="text" style="width:100%;" name="kode" class="form-control" id="exampleInputPassword1" placeholder="Kode" value="{{ $row->kode }}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Sign</label>
                        <input type="text" style="width:100%;" name="sign" class="form-control" id="exampleInputEmail1" placeholder="Sign" value="{{ $row->sign }}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Lantai</label>
                        <input type="text" style="width:100%;" name="lantai" class="form-control" id="exampleInputPassword1" placeholder="Lantai" value="{{ $row->floor}} ">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Block</label>
                        <input type="text" style="width:100%;" name="block" class="form-control" id="exampleInputPassword1" placeholder="Block" value="{{ $row->block }}">
                      </div>
                      <div class=form-group>
                        <label for="exampleInputPassword1">Kios</label>
                        <input type="text" style="width:100%;" name="kios" class="form-control" id="exampleInputPassword1" placeholder="Kios" value="{{ $row->kios }}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Nominal</label>
                        <input type="text" style="width:100%;" name="nominal" class="form-control" id="exampleInputPassword1" placeholder="Nominal" value="{{ $row->tagihan}} ">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin untuk update data ini? ')">Submit</button>
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <a href="{{ url('display/data/import/scls') }}" class="btn btn-secondary"> Back </a>
                </div>
              </form>
              @endforeach
            </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
@endsection
@section('javascript')
  <script src="{{ asset('plugins/select2/js/select2.full.js') }}"></script>
  <script src="{{ asset('plugins/select2/js/seelct2.full.min.js') }}"></script>
  <script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
  <script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
@endsection