<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['belum_kembali', 'selesai', 'batal'])->default('belum_kembali');
            $table->timestamp('tanggal_sewa')->nullable();
            $table->timestamp('tanggal_kembali')->nullable();
            $table->integer('durasi_sewa')->nullable();
            $table->decimal('biaya_total', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
