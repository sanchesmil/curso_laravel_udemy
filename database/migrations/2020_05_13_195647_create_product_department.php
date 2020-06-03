<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Relacionamento n x n
        Schema::create('product_department', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('department_id');
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade'); // Se apagar o produto, apaga o registro de relacionamento
            $table->foreign('department_id')->references('id')
                ->on('departments')->onDelete('cascade'); // Se apagar o departamento, apaga o registro de relacionamento;
            
            $table->primary(['product_id','department_id']); // Cria a chave primária vinculando as chaves estrangeiras
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_department');
    }
}
