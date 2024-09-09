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
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->float('nominal');
            $table->date('tanggal');
            $table->string('catatan');
            $table->unsignedBigInteger('jenis_pengeluaran_id');
            $table->timestamps();

            $table->foreign('jenis_pengeluaran_id')->references('id')->on('jenis_pengeluaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};
