<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upah', function (Blueprint $table) {
            $table->id();
            $table->char('role', 30); // petugas, admin
            $table->unsignedInteger('gaji_pokok');
            $table->unsignedInteger('tunjangan_makan');
            $table->unsignedInteger('tunjangan_transport');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upah');
    }
}
