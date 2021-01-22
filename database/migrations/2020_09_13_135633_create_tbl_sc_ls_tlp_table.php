<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblScLsTlpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sc_ls_tlp', function (Blueprint $table) {
            $table->id('id_sc_ls_tlp');
            $table->string('account',10)->nullable();
            $table->string('sc')->nullable();
            $table->string('ls')->nullable();
            $table->string('telpon')->nullable();
            //$table->foreign('account')->references('account_nas')->on('TblNasabah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sc_ls_tlp');
    }
}
