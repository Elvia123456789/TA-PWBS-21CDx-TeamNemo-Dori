<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_datapakan', function (blueprint $table) {
            // $table->id();

            // buat field id
            $table->integer('id')->autoIncrement();
            // buat field kode pakan
            $table->varchar("kode", 8);
            // buat field nama pakan
            $table->string("jenis", 100);
            // buat field jumlah
            $table->integer('jumlah', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_datakolam');
    }
};
