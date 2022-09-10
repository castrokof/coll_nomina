<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('position');
            $table->bigInteger('salary');
            $table->Integer('value_hour');
            $table->Integer('value_hour_add')->nullable();
            $table->Integer('value_patient_attended')->nullable();
            $table->Integer('value_hour_night')->nullable();
            $table->Integer('value_add_security_social')->nullable();
            $table->Integer('value_transporte')->nullable();
            $table->Integer('value_salary_add')->nullable();
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
        Schema::dropIfExists('position');
    }
}

