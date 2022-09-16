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
        Schema::table('projects', function (Blueprint $table) {

            $table->text('description');
            $table->string('project_id');
            // $table->unsignedBigInteger('manager_id');
            // $table->foreign('manager_id')->references('id')->on('managers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
            $table->dropColumn('description');
            $table->dropColumn('project_id');

            // $table->dropForeign(['team_id']);
        });
    }
};

// C:\Apache24\htdocs\TracK_A_Task\database\migrations\2022_04_03_192904_add_description_team_fk_to_projects.php