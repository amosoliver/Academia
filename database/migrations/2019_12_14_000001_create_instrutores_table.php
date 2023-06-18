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
        Schema::create('instrutors', function (Blueprint $table) {
            $table->bigIncrements('id_instrutor');
            $table->string('nome');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('instrutors');
    }
};
