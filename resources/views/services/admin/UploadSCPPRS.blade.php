@extends('adminlte::page')

@section('content')

<h3><i class="fa fa-angle-right"></i> Upload Data <strong>Autodebet SCPR (SC->PPRS)</strong></h3>
    <div class="row mt">
        <div class="col-lg-12">
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
          <form id="fileupload" action="{{ url('/upload-sc-scpr') }}" method="POST" enctype="multipart/form-data">
            <!-- Redirect browsers with JavaScript disabled to the origin page -->
            {{ csrf_field() }}
                <noscript>
                    <input type="hidden" name="redirect" value="">
                </noscript>
            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
            <div class="row fileupload-buttonbar">
                <div class="col-lg-8">
                <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class="btn btn-primary fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <input type="file" name="file-upload" class="btn btn-primary" require>
                    </span>
                    <button type="submit" class="btn btn-theme start">
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start upload</span>
                    </button>
                    <button type="reset" class="btn btn-theme02 cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel upload</span>
                    </button>
                </div>
                <div class="col-lg-12">
                    <div class="adv-table">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode Pengelola</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            @php
                                $no= 1;
                            @endphp

                            <tbody>
                                <tr>
                                    <td>{{-- $upload->id --}}</td>
                                    <td>{{-- $upload->kode_pengelola --}}</td>
                                    <td>{{-- $upload->keterangan --}}</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </form>
        </div>
        {{-- $uploads->links() --}}
    </div>

@endsection
