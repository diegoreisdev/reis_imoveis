<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('imovel_proximidade', function (Blueprint $table) {
            $table->foreignId('imovel_id')->constrained('imoveis')->onDelete('CASCADE');
            $table->foreignId('proximidade_id')->constrained()->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imovel_proximidade');
    }
};
