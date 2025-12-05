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
        Schema::create('investimentos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('carteira_id')->constrained('carteiras')->onDelete('cascade');
            $table->foreignId('ativo_id')->constrained('ativos')->onDelete('cascade');

            $table->string('snapshot_nome');
            $table->string('snapshot_ticker');
            $table->double('snapshot_preco');
            $table->string('snapshot_tipo');
            $table->double('quantidade');

            $table->double('valor_aplicado');
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->double('retorno_percentual')->default(0);

            $table->timestamps();
        });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investimentos');
    }
};
