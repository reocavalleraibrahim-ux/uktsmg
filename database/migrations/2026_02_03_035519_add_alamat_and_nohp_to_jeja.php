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
        Schema::table('jeja', function (Blueprint $table) {
            $table->string('alamat')->after('tanggal_lahir');
            $table->string('nohp')->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jeja', function (Blueprint $table) {
            $table->dropColumn('nohp');
            $table->dropColumn('alamat');
        });
    }
};
