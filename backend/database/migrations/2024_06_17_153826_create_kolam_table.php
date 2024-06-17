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
        Schema::create('kolam', function (Blueprint $table) {
            // $table->id();

              // buat field id
              $table->integer('id')->autoIncrement();
              // // buat field kode kolam
              $table->varchar('kode', 100);
              // // buat field nama kolam
              $table->string('nama', 100);
              // // buat field ukuran kolam
              $table->string("jenis", 20);
              // // buat field jenis kolam
              $table->integer("ukuran", 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kolam');
    }
};
