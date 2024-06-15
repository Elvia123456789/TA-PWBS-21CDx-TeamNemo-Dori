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
        Schema::create('m_kolams', function (Blueprint $table) {
            // $table->id();

            // buat field id
            $table->integer('id')->autoIncrement();
            // // buat field nama kolam
            $table->char('nama', 100);
            // // buat field ukuran kolam
            $table->string("ukuran", 20);
            // // buat field jenis kolam
            $table->string("jenis", 15);
        

            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_kolams');
    }
};
