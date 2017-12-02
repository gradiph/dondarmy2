<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kegiatans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('donor_id')->unsigned();
            $table->integer('kegiatan_id')->unsigned();
            $table->integer('antrian');
            $table->enum('panggil',['Sudah','Belum']);
            $table->enum('terima',['Terima','Tidak']);

            $table->foreign('donor_id')->references('id')->on('donors')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_kegiatans');
    }
}
