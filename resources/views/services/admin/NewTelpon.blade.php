@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-heade">
                    <h3 class="card-title"><i class="fa fa-angle-right"></i> Import Data <strong>Autodebet Telpon</strong></h3>
                </div>
            </div>
            <!-- The file upload form used as target for the file upload widget -->
            @if (count($errors) >0 )
            <div class="alert alert-danger">
                Upload validation error<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
          <div class="card">
            <div class="card-body">
                <form id="fileupload" action="{{ url('/import/telpon') }}" method="POST" enctype="multipart/form-data">
                <!-- Redirect browsers with JavaScript disabled to the origin page -->
                {{ csrf_field() }}
                    <noscript>
                        <input type="hidden" name="redirect" value="">
                    </noscript>
                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                    <div class="row fileupload-buttonbar">
                        <div class="col-lg-8">
                        <!-- The fileinput-button span is used to style the file input field as button -->
                            <span class="btn fa fa-plus-square btn-xs fileinput-button">
                                <i class=""></i>
                            <span>Add files...</span>
                            <input type="file" name="file-upload" class="btn" require>
                            </span>
                            <button type="submit" class="btn btn-sm btn-success fa fa-cloud-upload">
                                <i class=""></i>
                                <span>Start Import</span>
                            </button>
                            <button type="reset" class="btn btn-sm btn-danger">
                                <i class=""></i>
                                <span>Ignore</span>
                            </button>
                            <a href="{{ url('import/new') }}" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin untuk membatalkan & kembali ?')">Back</a>
                        </div>
                    </div>
                </form>
             </div>
           </div>
        </div>
        {{-- $uploads->links() --}}
    </div>
@endsection
