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
        Schema::create('ukt', function(Blueprint $table){
            $table->id();
            $table->string('nama_ukt');
            $table->enum('jenis_ukt',['UKT Reguler','UKT Dan']);
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->string('tempat_ukt');
            $table->string('informasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukt');
    }
};
