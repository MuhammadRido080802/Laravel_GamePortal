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
        Schema::create('games', function (Blueprint $table) {
                $table->id();
                $table->string('nama_game',50);
                $table->string('nama_pemain',50);
                $table->dateTime('tanggal')->nullable();
                $table->unsignedBigInteger('pemain_id');
                $table->foreign('pemain_id')->references('id_pemain')->on('pemain')->onUpdate('cascade')->onDelete('cascade');
                $table->bigInteger('platform');
                $table->string('ulasan',50);
                $table->timestamps();
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
