<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->unique();
            $table->decimal('prix');
            $table->integer('remise');
            $table->integer('isPromo');
            $table->text('imgPath');
            $table->timestamp('date_debut')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('date_fin')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('catproduits')->onDelete('cascade');
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
