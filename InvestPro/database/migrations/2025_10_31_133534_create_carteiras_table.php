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

            // Relacionamento com usuários
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Dados da carteira
            $table->string('nome');
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->decimal('rentabilidade', 10, 2)->default(0);

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
