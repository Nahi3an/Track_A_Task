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
        Schema::create('company_admins', function (Blueprint $table) {

            $table->id('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('personal_email');
            $table->string('contact_number');
            $table->text('address');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company__admins');
    }
};