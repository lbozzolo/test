<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasServiciosRelacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_categorias', function (Blueprint $table) {
            $table->integer('servicios_id')->unsigned();
            $table->foreign('servicios_id')->references('id')->on('servicios');
            $table->integer('categorias_id')->unsigned();
            $table->foreign('categorias_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
