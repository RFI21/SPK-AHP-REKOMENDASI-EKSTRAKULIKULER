<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preferensi_pembeli', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembeli');
            $table->json('nilai_kriteria'); // simpan preferensi user per kriteria
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preferensi_pembeli');
    }
};
