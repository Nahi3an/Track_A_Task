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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->text('remarks');
            $table->string('result');
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('tester_id');
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('tester_id')->references('id')->on('testers');
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
        Schema::dropIfExists('tests');
    }
};