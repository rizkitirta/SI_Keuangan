<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableManagePemasukan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_pemasukan', function (Blueprint $table) {
            $table->string('pemasukan_id', 40);
            $table->string('sumber_pemasukan');
            $table->integer('nominal');
            $table->datetime('tanggal');
            $table->text('keterangan');

            $table->primary('pemasukan_id');
            $table->foreign('sumber_pemasukan')
            ->references('id')->on('pemasukan')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manage_pemasukan', function (Blueprint $table) {
            //
        });
    }
}
