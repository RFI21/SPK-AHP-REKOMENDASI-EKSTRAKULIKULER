<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perbandingan_kriteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kriteria_1_id');
            $table->unsignedBigInteger('kriteria_2_id');
            $table->decimal('nilai', 8, 4)->default(1);
            $table->timestamps();

            $table->foreign('kriteria_1_id')->references('id')->on('kriteria')->onDelete('cascade');
            $table->foreign('kriteria_2_id')->references('id')->on('kriteria')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perbandingan_kriteria');
    }
};
