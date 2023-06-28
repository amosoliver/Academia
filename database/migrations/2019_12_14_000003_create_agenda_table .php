<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->bigIncrements('id_agenda');
            $table->date('data');
            $table->unsignedBigInteger('id_aluno');
            $table->unsignedBigInteger('id_dia_hora');
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_aluno')->references('id_aluno')->on('alunos')->onDelete('cascade');
            $table->foreign('id_dia_hora')->references('id_dia_hora')->on('dias_horas')->onDelete('cascade');
            $table->foreign('id_status')->references('id_status')->on('status')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
