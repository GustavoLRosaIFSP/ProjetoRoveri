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
        Schema::create('carteiras', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('nome');
            $table->double('valor_total')->default(0);
            $table->integer('quantidade')->default(0);
            $table->double('rentabilidade')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
=======

            // Relacionamento com usuários
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Dados da carteira
            $table->string('nome');
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->decimal('rentabilidade', 10, 2)->default(0);

>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carteiras');
    }
};