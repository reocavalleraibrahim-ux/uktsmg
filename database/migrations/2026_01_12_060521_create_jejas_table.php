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
        Schema::create('jeja', function (Blueprint $table) {
            $table->id();
            $table->integer('id_dojang');
            $table->string('nama_jeja');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('tingkat');
            $table->string('no_registrasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jejas');
    }
};
