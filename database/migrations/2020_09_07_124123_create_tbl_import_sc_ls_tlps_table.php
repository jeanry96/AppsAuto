<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblImportScLsTlpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_import_sc_ls_tlps', function (Blueprint $table) {
            $table->id();
            $table->string('kode',4)->nullable();
            $table->string('sign',1)->nullable();
            $table->string('floor',5)->nullable();
            $table->string('block',5)->nullable();
            $table->string('kios',5)->nullable();
            $table->decimal('tagihan',15,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_import_sc_ls_tlps');
    }
}
