<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('rua', 100);
            $table->integer('numero');
            $table->string('complemento', 20)->nullable();
            $table->string('bairro', 100);

            $table->foreignId('imovel_id')->constrained('imoveis')->onDelete('CASCADE');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
};
