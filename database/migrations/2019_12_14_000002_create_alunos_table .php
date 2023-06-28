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
            $table->string('dia_semana');
            $table->float('mensalidade');
            $table->unsignedBigInteger('id_instrutor');
            $table->foreign('id_instrutor')->references('id_instrutor')->on('instrutors')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
