<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewfieldsToUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->string('name_bank', 255)->nullable()->after('cargo_id');
            $table->string('account', 255)->nullable()->after('cargo_id');
            $table->string('type_account', 255)->nullable()->after('cargo_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuario', function (Blueprint $table) {
            Schema::dropColumn('name_bank');
            Schema::dropColumn('account');
            Schema::dropColumn('type_account');
        });
    }
}
