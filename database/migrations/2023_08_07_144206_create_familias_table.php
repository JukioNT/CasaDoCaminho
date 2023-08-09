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
        Schema::create('familias', function (Blueprint $table) {
            $table->id();
            $table->string('NomeResponsavel');
            $table->string('estadoCivil');
            $table->string('nomeCompanhiero')->nullable();
            $table->date('nascimento');
            $table->string('endereço');
            $table->string('telefone');
            $table->string('profissão');
            $table->string('escolaridade');
            $table->integer('Nfilhos');
            $table->integer('rendafamiliar');
            $table->string('recebeajuda', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familias');
    }
};
