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
            $table->string('submission_teams_email');

            $table->unsignedBigInteger('submission_teams_orcidID');
            $table->foreign('submission_teams_orcidID')->references('author_orcidID')->on('unique_identifiers');
            
            $table->unsignedBigInteger('submission_paper_id');
            $table->foreign('submission_paper_id')->references('id')->on('submissions');
            
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
