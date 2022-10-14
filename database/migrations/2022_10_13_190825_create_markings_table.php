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
        Schema::create('markings', function (Blueprint $table) {
            $table->id();
            $table->string('review_status');

            $table->unsignedBigInteger('marking_submission_id');
            $table->foreign('marking_submission_id')->references('id')->on('submissions');

            $table->unsignedBigInteger('marking_review_user_id');
            $table->foreign('marking_review_user_id')->references('id')->on('users');

            $table->unsignedBigInteger('marking_conference_id');
            $table->foreign('marking_conference_id')->references('id')->on('conferences');
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
        Schema::dropIfExists('markings');
    }
};
