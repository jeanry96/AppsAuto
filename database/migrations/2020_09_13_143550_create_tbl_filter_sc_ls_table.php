<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFilterScLsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_filter_sc_ls', function (Blueprint $table) {
            $table->id();
            $table->string('kode',4)->nullable();
            $table->string('sign',1)->nullable();
            $table->string('referensi',10)->nullable();
            $table->decimal('nominal',15,2)->nullable();
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
        Schema::dropIfExists('tbl_filter_sc_ls');
    }
}
