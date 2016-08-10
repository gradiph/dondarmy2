<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_register',16)->unique();
            $table->string('nama');
            $table->integer('gol_darah_id')->unsigned()->nullable();
            $table->enum('kelamin',['Pria','Wanita']);
            $table->string('tempat_lahir',50)->nullable();
            $table->date('tgl_lahir');
            $table->string('telp',13);
            $table->string('alamat')->nullable();
            $table->string('rt',3)->nullable();
            $table->string('rw',3)->nullable();
            $table->string('kelurahan',30)->nullable();
            $table->string('kecamatan',30)->nullable();
            $table->string('kode_pos',5)->nullable();
            $table->integer('pekerjaan_id')->unsigned();
            $table->enum('penghargaan',['10','25','50','75','100'])->nullable();
            $table->integer('total_donor')->nullable();
            $table->date('donor_terakhir')->nullable();

            $table->foreign('gol_darah_id')->references('id')->on('gol_darahs');
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('donors');
    }
}
