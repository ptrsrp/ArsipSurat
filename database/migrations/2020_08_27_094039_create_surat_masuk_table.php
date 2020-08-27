<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_agenda');
            $table->date('tgl_diterima');
            $table->unsignedBigInteger('id_instansi');
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->string('perihal');
            $table->string('file');
            $table->timestamps();

            $table->foreign('id_instansi')->references('id')->on('instansi')
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
        Schema::dropIfExists('surat_masuk');
    }
}
