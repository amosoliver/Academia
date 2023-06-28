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
        Schema::create('dias_horas', function (Blueprint $table) {
            $table->bigIncrements('id_dia_hora');

            $table->unsignedBigInteger('id_dia');
            $table->foreign('id_dia')->references('id_dia')
                ->on('dias')->onDelete('cascade');
            $table->unsignedBigInteger('id_hora');
            $table->foreign('id_hora')->references('id_hora')->on('horas')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('dias_horas');
    }
};
