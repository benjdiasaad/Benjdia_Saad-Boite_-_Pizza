<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoitmsgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boitmsgs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objet');
            $table->string('message');
            $table->boolean('vu');
            $table->datetime('date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('boitmsgs');
    }
}
