<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiquidationxuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidationxuser', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_pay');
            $table->decimal('hour_paid',1);
            $table->decimal('hour_add',1);
            $table->integer('turn_night',2);
            $table->text('pay_period');
            $table->bigInteger('total_payment');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'fk_usuario_liquidationxuser')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('liquidationxuser');
    }
}
