<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            $table->string('url', 255);
            $table->foreignId('imovel_id')->constrained('imoveis')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fotos');
    }
};
