<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ativos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
<<<<<<< HEAD:InvestPro/database/migrations/2025_12_04_010626_create_ativos_table.php
            $table->string('codigo_ticker')->unique();
            $table->double('preco_atual');
            $table->string('tipo'); 
            $table->string('risco');
=======
            $table->string('codigo_ticker')->nullable();
            $table->double('preco_atual');
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7:InvestPro/database/migrations/2025_10_31_133456_create_ativos_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ativos');
    }
};
