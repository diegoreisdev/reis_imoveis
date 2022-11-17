<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('imoveis', function (Blueprint $table) {
            $table->string('preco')->change();
        });
    }

    public function down()
    {

    }
};
