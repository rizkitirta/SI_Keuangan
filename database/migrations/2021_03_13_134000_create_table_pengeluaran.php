<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePengeluaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_pengeluaran', function (Blueprint $table) {
            $table->string('pengeluaran_id',40);
            $table->integer('nominal');
            $table->datetime('tanggal');
            $table->text('keterangan');

            $table->primary('pengeluaran_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manage_pengeluaran', function (Blueprint $table) {
            //
        });
    }
}
