<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBrandsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id');  //Cria o campo de chave estrangeira
            $table->foreign('brand_id')->references('id')->on('brands'); // Associa o campo 'brand_id' de 'products' ao campo 'id' de 'brands'
        
            // Obs.: Por convenção, no Laravel, o campo de chave estrangeira é 
            // iniciado pelo nome singular da tabela que está sendo referenciada (
            // (no singular) + '_id' => ex. 'brand_id' 
            // No momento de fazer relacionamentos o Laravel já faz inferências com 
            // usando esse 'padrão' de nomenclatura.
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Obs.: A reversão deve ser feita na ordem contrária ao que foi feito no método 'up'
            $table->dropForeign(['brand_id']);  // 1º apaga a constrant (pode passar vários parâmetros por array)
            $table->dropColumn('brand_id');     // 2º apaga o campo (se for somente 1 campo pode passar direto)
        });
    }
}
