<?php

// database/migrations/xxxx_xx_xx_create_anotacoes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnotacoesTable extends Migration
{
    public function up()
    {
        Schema::create('anotacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->text('anotacao');
            $table->timestamps();

            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('anotacoes');
    }
}
