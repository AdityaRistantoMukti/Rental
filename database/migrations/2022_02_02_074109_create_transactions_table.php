<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_faktur');
            $table->unsignedInteger('kodebarang_id');
            $table->unsignedInteger('namabarang_id');
            $table->string('nama_peminjam');
            $table->string('jumlah');
            $table->string('tanggal_pinjam');
            $table->string('tanggal_kembali');
            $table->string('idr');
            $table->string('email')->unique();
            $table->string('phone');
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
        Schema::dropIfExists('transactions');
    }
}
