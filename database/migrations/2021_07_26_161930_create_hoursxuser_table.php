<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoursxuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoursxuser', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('date_hour_initial_turn');
            $table->dateTime('date_hour_end_turn');
            $table->string('working_type', 20);
            $table->decimal('hours',10,1);
            $table->text('observation')->nullable();
            $table->string('supervisor', 50)->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'fk_usuario_hoursxuser')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('hoursxuser');
    }
}
