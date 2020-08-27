<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_agenda');
            $table->date('tgl_kirim');
            $table->string('no_surat');
            $table->unsignedBigInteger('penerima');
            $table->string('perihal');
            $table->string('file');
            $table->timestamps();

            $table->foreign('penerima')->references('id')->on('instansi')
                    ->onUpdate('CASCADE')
                    ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_keluar');
    }
}
