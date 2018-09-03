<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesCutiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses_cuti', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cuti_id');
            $table->foreign('cuti_id')->references('id')->on('cutis');
            $table->enum('status', ['disetujui', 'ditolak']);
            $table->string('alasan');
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
        Schema::dropIfExists('statuses_cuti');
    }
}
