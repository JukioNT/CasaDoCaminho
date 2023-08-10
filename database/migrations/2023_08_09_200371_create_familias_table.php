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
            $table->unsignedBigInteger('estadoCivil_id');
            $table->foreign('estadoCivil_id')->references('id')->on('estado_civils');
            $table->string('nomeCompanheiro')->nullable();
            $table->date('nascimento');
            $table->string('endereco');
            $table->string('telefone');
            $table->string('profissao');
            $table->unsignedBigInteger('escolaridade_id');
            $table->foreign('escolaridade_id')->references('id')->on('escolaridades');
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
