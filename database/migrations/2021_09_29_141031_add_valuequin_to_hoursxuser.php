<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValuequinToHoursxuser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoursxuser', function (Blueprint $table) {
            $table->string('quincena', 50)->nullable()->after('supervisor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hoursxuser', function (Blueprint $table) {
            $table->dropColumn('quincena');
        });
    }
}
