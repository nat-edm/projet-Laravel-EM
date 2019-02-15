<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->decimal('price', 6, 2);
            $table->enum('size', ['36', '38', '40', '42', '44', '46', '48', '50', '52']);
            $table->string('url_image', 200)->nullable();
            $table->enum('status', ['Publié', 'Brouillon']);
            $table->enum('code', ['solde', 'new']);
            $table->string('reference', 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
