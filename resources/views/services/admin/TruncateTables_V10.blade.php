@extends('adminlte::page')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title"><strong><i class="fa fa-angle-right"></i> Remove Data Import & Filter </strong></h2>
        </div>
      </div>
      <!-- /.card-header -->
        @if(count($errors) > 0 )
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
        <div class="card-header">
          <table id="example2" class="table table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Keterangan</th>
              <th></th>
              <th></th>
              <th>Kode</th>
              <th></th>
              <th></th>
              <th></th>
              <th>Pilihan</th>
            </tr>
            </thead>
            <tbody>
            
            <tr>
              <td>1.</td>
              <td>Untuk menghapus data Import ( <strong>{{ $SCPRImport }} </strong>) & Filter (<strong>{{ $SCPRFilter }} </strong>)</td>
              <td></td>
              <td></td>
              <td>SCPR</td>
              <td></td>
              <td></td>
              <td></td>
              <td> 
              <i class="far fa fa-trash-alt"></i>
                  <a href="{{ url('clr-upld-scpr') }}" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin untuk menghapus data SCPR ?')"> DEL IMPR</a>
                  <a href="{{ route('clr.fltr.scpr') }}" class="btn btn-danger btn-xs " onclick="return confirm('Apakah anda yakin untuk menghapus data filter SCPR ?')">DEL FILTR</a>
              </td>
            </tr>
            <tr>
              <td>2. </td>
              <td>Untuk menghapus data Import (<strong>{{ $LSPRImport }} </strong> ) & Filter (<strong> {{ $LSPRFilter }} </strong>)</td>
              <td> </td>
              <td> </td>
              <td>LSPR</td>
              <td> </td>
              <td> </td>
              <td></td>
              <td> 
              <i class="far fa fa-trash-alt"></i>
                <a href="{{ url('clr-upld-lspr') }}" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin untuk menghapus data LSPR?')"> DEL IMPR</a>
                <a href="{{ route('clr.fltr.lspr') }}" class="btn btn-danger btn-xs" onclick="return confirm('Apakaha anda yakin untk menghapus data filter LSPR')">DEL FILTR</a>
              </td>
            </tr>
            
            <tr>
              <td>3. </td>
              <td>Untuk menghapus data Import (<strong> {{ $SCMMImport }} </strong>) & Filter ( <strong>{{ $SCMMFilter }}</strong> )</td>
              <td> </td>
              <td> </td>
              <td>SCMM </td>
              <td> </td>
              <td> </td>
              <td></td>
              <td> 
              <i class="far fa fa-trash-alt"></i>
                <a href="{{ url('clr-upld-scmm') }}" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin untuk menghapus data SCMM ?')"> DEL IMPR</a>
                <a href="{{ route('clr.fltr.scmm') }}" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin untuk menghapus data filter SCMM ?')">DEL FILTR</a>
              </td>
            </tr>
            <tr>
              <td>4. </td>
              <td>Untuk menghapus data Import ( <strong> {{ $LSMMImport }} </strong> ) & Filter ( <strong>{{ $LSMMFilter }}</strong> ) </td>
              <td> </td>
              <td> </td>
              <td>LSMM </td>
              <td> </td>
              <td> </td>
              <td></td>
              <td>
              <i class="far fa fa-trash-alt"></i>
                <a href="{{ url('clr-upld-lsmm') }}" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin untuk menghapus data LSMM ?')"> DEL IMPR</a>
                <a href="{{ route('clr.fltr.lsmm') }}" class="btn btn-danger btn-xs" onclick="return confirm('Apakaha anda yakin untuk menghapus data filter  LSMM')">DEL FILTR</a>
              </td>
            </tr>
            <tr>
              <td>5. </td>
              <td>Untuk menghapus data Import( <strong> {{ $SCSTImport }} </strong> ) & Filter ( <strong> {{ $SCSTFilter }}</strong> )</td>
              <td> </td>
              <td> </td>
              <td>SCST </td>
              <td> </td>
              <td> </td>
              <td></td>
              <td>
                <i class="far fa fa-trash-alt"></i>
                <a href="{{ url('clr-upld-scst') }}" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin untuk menghapus data SCST ?')"> DEL IMPR</a>
                <a href="{{ route('clr.fltr.scst') }}" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin untuk menghapus data filter SCST')">DEL FILTR</a>
              </td>
            </tr>
            <tr>
              <td>6. </td>
              <td>Untuk menghapus data Import ( <strong> {{ $LSSTImport }} </strong> ) & Filter ( <strong>{{ $LSSTFilter }} </strong>) </td>
              <td> </td>
              <td> </td>
              <td>LSST </td>
              <td> </td>
              <td> </td>
              <td></td>
              <td> 
                <i class="far fa fa-trash-alt"></i>
                <a href="{{ url('clr-upld-lsst') }}" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin untuk menghapus di LSST ?')"> DEL IMPR</a>
                <a href="{{ route('clr.fltr.lsst') }}" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin untuk menghapus data filter LSST')">DEL FILTR</a>
              </td>
            </tr>
           
            <tr>
              <td>7. </td>
              <td>Untuk menghapus data Import ( <strong> {{ $TPMIImport }} </strong> )</td>
              <td> </td>
              <td> </td>
              <td>TPMI </td>
              <td> </td>
              <td> </td>
              <td></td>
              <td>
              <i class="far fa fa-trash-alt"></i>
                <a href="{{ url('clr-upld-tpmi') }}" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin untuk menghapus data TPMI ?');"> DEL IMPR</a>
              </td>
            </tr>
            <tr>
              <td>8. </td>
              <td>Hapus semua jenis data ( Import <strong>{{ $totalDataImport }}</strong> & Filter <strong>{{ $totalDataFilter }}</strong> )  </td>
              <td>SCPR</td>
              <td>LSPR</td>
              <td>SCMM</td>
              <td>LSMM</td>
              <td>LSST</td>
              <td>TPMI</td>
              <td> 
                <i class="far fa fa-trash-alt"></i>
                <a href="{{ route('clr.all.upld.cvrt.data') }}" class="btn btn-danger btn-xs"> DELETE ALL</a>
              </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
            </tfoot>
          </table>
        
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
  <!-- /.card -->
<!-- /.container-fluid -->

@endsection
