<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perbandingan_alternatif', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternatif_1_id');
            $table->unsignedBigInteger('alternatif_2_id');
            $table->unsignedBigInteger('kriteria_id');
            $table->decimal('nilai', 8, 4)->default(1);
            $table->timestamps();

            $table->foreign('alternatif_1_id')->references('id')->on('alternatif')->onDelete('cascade');
            $table->foreign('alternatif_2_id')->references('id')->on('alternatif')->onDelete('cascade');
            $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perbandingan_alternatif');
    }
};
