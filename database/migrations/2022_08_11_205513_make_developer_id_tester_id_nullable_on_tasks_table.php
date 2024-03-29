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
        Schema::table('Tasks', function (Blueprint $table) {
            //
            $table->bigInteger('developer_id')->unsigned()->nullable()->change();
            $table->bigInteger('tester_id')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Tasks', function (Blueprint $table) {
            //
            $table->bigInteger('developer_id')->unsigned()->nullable(false)->change();
            $table->bigInteger('tester_id')->unsigned()->nullable(false)->change();
        });
    }
};