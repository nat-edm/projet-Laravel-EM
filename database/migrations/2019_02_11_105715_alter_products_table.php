<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->nullable(); // un produit peut ne pas avoir de genre
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL'); // Si la catégorie du produit est supprimé, le produit continue d'exister avec un champ genre nul
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
            $table->dropForeign('products_category_id_foreign'); // d'abord enlever la relation
            $table->dropColumn('category_id'); // puis supprimer la colonne
        });
    }
}
