<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblConvertSCLSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_convert_sc_ls', function (Blueprint $table) {
            $table->id('id_c');
            $table->string('jenis_kode')->nullable();
            $table->string('signs')->nullable();
            $table->string('references')->nullable();
            $table->string('nominal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_convert_sc_ls');
    }
}
