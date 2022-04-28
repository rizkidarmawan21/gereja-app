<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegIbadahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reg_ibadahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');

            $table->integer('seat_number');
            $table->string('name');
            $table->string('gender');
            $table->string('age');

            $table->unsignedBigInteger('capacity_id');
            $table->foreign('capacity_id')
                ->references('id')
                ->on('capacities')
                ->onDelete('cascade');

            $table->string('transportasi');
            $table->string('status_anggota');
            $table->string('status_kehadiran'); //hadir, izin, sakit, alfa  
            $table->softDeletes();
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
        Schema::dropIfExists('reg_ibadahs');
    }
}
