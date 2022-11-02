<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->integer('terreno');
            $table->integer('salas');
            $table->integer('banheiros');
            $table->integer('dormitorios');
            $table->integer('garagens');
            $table->text('descricao')->nullable();
            $table->decimal('preco', 12,2);

            $table->foreignId('cidade_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('tipo_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('finalidade_id')->constrained()->onDelete('CASCADE');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imovels');
    }
};
