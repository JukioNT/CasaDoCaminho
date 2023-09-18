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
        Schema::create('colaboradors', function (Blueprint $table) {
            $table->id();
            $table->string('CPF')->unique();
            $table->string('Nome');
            $table->string('Endereco');
            $table->string('Telefone');
            $table->date('Nascimento');
            $table->string('Email');
            $table->string('Disponibilidade');
            $table->string('Religiao');
            $table->string('Afinidade');
            $table->string('Senha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaboradors');
    }
};
