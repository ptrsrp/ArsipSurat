<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_surat_masuk');
            $table->unsignedBigInteger('nippos_pgw');
            $table->text('isi');
            $table->timestamps();

            $table->foreign('id_surat_masuk')->references('id')->on('surat_masuk')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->foreign('nippos_pgw')->references('nippos')->on('pegawai')
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
        Schema::dropIfExists('disposisi');
    }
}
