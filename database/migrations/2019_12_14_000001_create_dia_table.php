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
        Schema::create('dias', function (Blueprint $table) {
            $table->bigIncrements('id_dia');
            $table->string('ds_dia');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('dias');
    }
};
