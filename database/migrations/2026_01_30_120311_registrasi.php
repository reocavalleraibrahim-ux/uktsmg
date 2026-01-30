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
        Schema::create('registrasi',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_ukt');
            $table->foreign('id_ukt')
                ->references('id')
                ->on('ukt');
            $table->unsignedBigInteger('id_jeja');
            $table->foreign('id_jeja')
                ->references('id')
                ->on('jeja');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi');
    }
};
