<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('developers', function (Blueprint $table) {

            $table->string('personal_email');
        });

        Schema::table('testers', function (Blueprint $table) {

            $table->string('personal_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('developers', function (Blueprint $table) {
            $table->dropColumn('personal_email');
        });

        Schema::table('testers', function (Blueprint $table) {
            $table->dropColumn('personal_email');
        });
    }
};