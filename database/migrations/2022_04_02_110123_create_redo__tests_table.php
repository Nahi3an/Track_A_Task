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
        Schema::create('redo_tests', function (Blueprint $table) {
            $table->id();
            $table->string('issue_tags');
            $table->text('problem_description');
            $table->dateTime('date');
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('tester_id');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('manager_id')->references('id')->on('managers')->onDelete('cascade');
            $table->foreign('tester_id')->references('id')->on('testers')->onDelete('cascade');
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
        Schema::dropIfExists('redo__tests');
    }
};