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
        Schema::create('panen', function (Blueprint $table) {
            // $table->id();

            // buat field id
            $table->integer('id')->autoIncrement();
             // buat field kode panen
            $table->varchar("kode", 8);
             // buat field jenis ikan
            $table->string("jenis", 100);
             // buat field jumlah panen
            $table->integer('jumlah', 15);
             // buat field tanggal panen
            $table->integer('tanggal', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panen');
    }
};
