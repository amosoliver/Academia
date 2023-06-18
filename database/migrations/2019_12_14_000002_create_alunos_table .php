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
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id_aluno');
            $table->string('nome');
            $table->string('cpf');
            $table->text('email');
            $table->string('dt_nascimento');
            $table->unsignedBigInteger('id_instrutor');
            $table->foreign('id_instrutor')->references('id_instrutor')->on('instrutores')->onDelete('cascade');
            $table->unsignedBigInteger('id_pacote');
            $table->foreign('id_pacote')->references('id_pacote')->on('pacotes')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
