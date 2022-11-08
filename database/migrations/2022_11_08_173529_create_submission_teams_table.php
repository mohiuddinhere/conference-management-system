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
        Schema::create('submission_teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->
            $table->foreign('submission_teams_orcidId')->references('author_orcidID')->on('unique_identifiers');
            $table->unsignedBigInteger('submission_teams_orcidId');
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
        Schema::dropIfExists('submission_teams');
    }
};
