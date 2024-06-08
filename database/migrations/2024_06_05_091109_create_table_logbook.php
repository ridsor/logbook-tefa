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
        Schema::create('logbook', function (Blueprint $table) {
            $table->string('id',100)->primary();
            $table->string('nama',100);
            $table->text('kegiatan')->nullable();
            $table->timestampTz('waktu masuk', precision: 0)->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestampTz('waktu keluar', precision: 0)->nullable();
            $table->string('status',100)->default('belum diverifikasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logbook');
    }
};
