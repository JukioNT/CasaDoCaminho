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
            $table->string('NomeResponsavel');
            $table->string('EstadoCivil');
            $table->string('NomeCompanheiro');
            $table->timestamp('Nascimento');
            $table->string('Endereco');
            $table->string('Telefone');
            $table->string('Profissao');
            $table->string('Escolaridade');
            $table->integer('Nfilhos');
            $table->timestamp('NascimentoFilhos');
            $table->integer('RendaFamiliar');
            $table->string('RecebeAjuda');
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
