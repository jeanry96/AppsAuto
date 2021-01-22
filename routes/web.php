<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');

Auth::routes();

Route::group(['middleware'  => 'auth'], function() {
  Route::get('/','HomeController@index')->name('home');

  /** Start display Customere here */

  Route::get('customers/account','Master\MasterController@Customer')->name('customers.account');
  Route::get('customer/autodebet','Master\MasterController@customerAutodebet')->name('customer.autodebet');
  /** End display Customers here */

  /**Start master data here */
  Route::any('master/account','Master\MasterController@nasabah')->name('master.account');
  Route::get('master/account/edit/{id}','Master\MasterController@MstrNsbhEdt')->name('master.account.edit.id');
  Route::put('master-account-update','Master\MasterController@MstrAccUpdt')->name('master.account.update');
  Route::get('master/account/delete/{id}','Master\MasterController@destroy')->name('master.account.delete');
  Route::get('master-detail-info-nasabah-{id}','Master\MasterController@infoDetailNasabah')->name('master.detail.info.nasabah'); 
  Route::get('master-dbt-edit-{id}','Master\MasterController@MstrDbtEdit')->name('master.dbt.edit');
  Route::put('master/debet/update','Master\MasterController@MstrtDbtUpdate')->name('master.debet.update');
  Route::get('master-pengelola','Master\MasterController@pengelola')->name('master.pengelola');
  Route::get('master-telpon','Master\MasterController@telpon')->name('master.telpon');
  Route::any('master/scls/telp','Master\MasterController@MstrScLsTelpon')->name('master.scls.telp');
  Route::get('master/delete/scls/telpon/{id}','Master\MasterController@DltMstrScLsTlp')->name('mstr.dlt.sc.ls.tlp');
  Route::get('master-listrik','Master\MasterController@listrik')->name('master.listrik');
  Route::get('master/users','Master\MasterController@users')->name('master.users');
  Route::get('profil/user/{id}','MasterController@profileUser')->name('prifile.user');

  /**End Master data here */

  // Route::get('print','Master\MasterController@print')->name('print');
  
  /** Import data to database */
  Route::get('import/new','Master\ImportController@newTask')->name('import.task');
  Route::get('new/telpon','Master\ImportController@newTelpon')->name('new.telpon');
  Route::post('import/telpon','Master\ImportController@importTelpon')->name('import.telpon');
  Route::get('new-sc-ls','Master\ImportController@newSC')->name('new.sc.ls');
  Route::post('import-sc-ls','Master\ImportController@importSC')->name('import.sc.ls');
  Route::post('import','Master\ImportController@importData')->name('import');
  Route::get('new/scls','Master\ImportController@newImportSCLS_V2_0')->name('new.scls');
  Route::post('import-sc-ls-v2-0','Master\ImportController@ImportSCLS_V2_0')->name('import.sc.ls.v2.0');

  /**
   * @Update Import
   */
  Route::get('import/edit/{id}','Master\ControllController@EditDataImportV2')->name('import.edit.v2');
  Route::put('import/update','Master\ControllController@UpdateDataImportV2')->name('import.update');
  /**
   * End here for Import
   */
  
  
  //Filter Data
  Route::get('filtering-data-v1-0','Master\ControllController@filterDataSCLS_V1_0')->name('filtering.data.v1.0');
  Route::get('filtering-data-v2-0','Master\ControllController@filterDataSCLS_V2_0')->name('filtering.data.v1.0');
  
  
  
  /**
   * Display data Import & Filter
   */
  Route::get('display/data/import/scls','Master\ControllController@displayDataUploadSCLS_V2_0')->name('display.data.import.scls');
  Route::get('display/data/import/telpon','Master\ControllController@displayDataUploadTelpon')->name('display.data.import.telpon');
  Route::any('display/data/filter','Master\ControllController@displyDataFilters_V2_0')->name('display.data.filter');
  
  
   /** 
    * Export data to excel
    * @ Version 1.0
    */ 
  Route::get('start-export','Master\ExportController@index')->name('start.export');
  Route::get('export-sc-scpr','Master\ExportController@exportSCPR')->name('export.sc.scpr');
  Route::get('export-sc-scmm','Master\ExportController@exportSCMM')->name('export.sc.scmm');
  Route::get('export-sc-scst','Master\ExportController@exportSCST')->name('export.sc.scst');
  Route::get('export-ls-lspr','Master\ExportController@exportLSPR')->name('export.ls.lspr');
  Route::get('export-ls-lsmm','Master\ExportController@exportLSMM')->name('export.ls.lsmm');
  Route::get('export-ls-lsst','Master\ExportController@exportLSST')->name('export.ls.lsst');
  
  /**
   * View Data To Export
   */
  
  Route::get('data-scmm-to-export','Master\SCLSController@viewDataSCMMToExport')->name('data.scmm.to.export');
  Route::get('data-lsmm-to-export','Master\SCLSController@viewDataLSMMToExport')->name('data.lsmm.to.export');
  
  Route::get('detail/data/all/listrik/to/export','Master\SCLSController@viewDataLSMM_LSPR_LSST_To_Export')->name('detail.data.all.listrik.to.export');
  Route::get('detail/data/all/service/to/export','Master\SCLSController@viewDataSCMM_SCPR_SCST_To_Export')->name('detail.data.all.service.to.export');
  Route::get('detail/data/telpon/to/export','Master\TPMIController@viewTelponToExport')->name('detail.data.telpon.to.export');

  /**
   * Export data to excel V2.0
   */
  
   Route::get('export/scls/telp','Master\ExportController@indexV20')->name('export.scls.telp');
   Route::get('export/excel/all/sc','Master\ExportController@exportExcelScV20')->name('export.excel.allsc');
   Route::get('export/excel/all/ls','Master\ExportController@exportExcelLsV20')->name('export.excel.allls');
   Route::get('export/excel/telpon','Master\ExportController@exportTPMI')->name('export.telpon');
   Route::get('export-excel-mstr-auto-dbt','Master\ExportController@MstrAutoDbtExcel')->name('export.excel.mstr.auto.dbt');
   Route::get('export/nasabah','Master\ExportController@MstrDataNsbh')->name('export.nasabah.excel');
  
  
  /**
   * Export to PDF
   */
  Route::get('/export/mstr/sc/ls/tlp/toPdf','Master\MasterController@MstrScLsTlpPdf')->name('export.mstr.sc.ls.tlp.toPdf');
  
  /**
   * Print
   */
  
   Route::get('print-mstr-sc-ls-tlp','Master\MasterController@printMstrScLsTlp')->name('print.mstr.sc.ls.tlp');
  
  
  /**
   * To Populate data into table member
   */
  Route::get('input/populate','Master\ControllController@newPopulate')->name('input.populate');
  Route::post('post/save/customer','Master\ControllController@store')->name('post.save.customer');
  Route::any('add/account/autodebet','Master\ControllController@searchNasabah')->name('add.account.autodebet');
  Route::get('master/insert/scls/telpon/{id}','Master\MasterController@formMstrScLsTlpIsrt')->name('master.insert.scls.telpon');
  Route::post('post/save/autodebet','Master\MasterController@createAutodebet')->name('post.save.autodebet');
  
  /** 
   * Truncate data from tables Import
   * V1
   * */
  Route::get('remove-data-v1-0','Master\TruncateController@removeDataV1_0')->name('remove.data.v1.0');
  Route::get('clr-upld-scpr','Master\TruncateController@delUpldSCPR')->name('clr.upld.scpr');
  Route::get('clr-upld-lspr','Master\TruncateController@delUpldLSPR')->name('clr.upld.lspr');
  Route::get('clr-upld-scmm','Master\TruncateController@delUpldSCMM')->name('clr.upld.scmm');
  Route::get('clr-upld-lsmm','Master\TruncateController@delUpldLSMM')->name('clr.upld.lsmm');
  Route::get('clr-upld-scst','Master\TruncateController@delUpldSCST')->name('clr.upld.scst');
  Route::get('clr-upld-lsst','Master\TruncateController@delUpldLSST')->name('clr.upld.lsst');
  Route::get('clr-upld-tpmi','Master\TruncateController@delUpldTPMI')->name('clr.upld.tpmi');
  Route::get('clr-all-upld-cvrt-data','Master\TruncateController@truncAllUpldCvrt')->name('clr.all.upld.cvrt.data');
  Route::get('clr-fltr-scpr','Master\TruncateController@delCvrtSCPR')->name('clr.fltr.scpr');
  Route::get('clr-fltr-lspr','Master\TruncateController@delCvrtLSPR')->name('clr.fltr.lspr');
  Route::get('clr-fltr-scmm','Master\TruncateController@delCvrtSCMM')->name('clr.fltr.scmm');
  Route::get('clr-fltr-lsmm','Master\TruncateController@delCvrtLSMM')->name('clr.fltr.lsmm');
  Route::get('clr-fltr-scst','Master\TruncateController@delCvrtSCST')->name('clr.fltr.scst');
  Route::get('clr-fltr-lsst','Master\Truncatecontroller@delCvrtLSST')->name('clr.fltr.lsst');
  
  /**
   * V2
   */
  Route::get('remove/data/import/export','Master\TruncateController@removeDataV2_0')->name('remove.data.import.export');
  Route::get('clr/import/scpr/v20','Master\TruncateController@delImportSCPRV20')->name('remove.import.scpr.v20');
  Route::get('clr/import/lspr/v20','Master\TruncateController@delImportLSPRV20')->name('remove.import.lspr.v20');
  Route::get('clr/import/scmm/v20','Master\TruncateController@delImportSCMMV20')->name('remove.import.scmm.v20');
  Route::get('clr/import/lsmm/v20','Master\TruncateController@delImportLSMMV20')->name('remove.import.lsmm.v20');
  Route::get('clr/import/scst/v20','Master\TruncateController@delImportSCSTV20')->name('remove.import.scst.v20');
  Route::get('clr/import/lsst/v20','Master\TruncateController@delImportLSSTV20')->name('remove.import.lsst.v20');
  Route::get('clr/all/import/filter/v20','Master\TruncateController@deleteAllImportFilterV20')->name('clr.all.import.filter.v20');
  
  /**
   * End Truncate Data Here
   */
  
   /**
    * @Documentation
  */
  Route::get('documentation','Master\DocController@index')->name('documentation.guide');
});
