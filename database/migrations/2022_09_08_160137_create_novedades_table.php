<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novedades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('road', 255)->nullable();
            $table->longText('nove_observacion')->nullable();
            $table->string('type_nove', 255)->nullable();
            $table->string('hours')->nullable();
            $table->string('total_pac')->nullable();
            $table->string('future3')->nullable();
            $table->unsignedBigInteger('nove_id');
            $table->foreign('nove_id', 'fk_novedades_hoursxuser')->references('id')->on('hoursxuser')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'fk_novedades_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('novedades');
    }
}
