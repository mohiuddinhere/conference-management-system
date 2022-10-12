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
        Schema::create('reviewer_infos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('reviewer_user_id');
            $table->foreign('reviewer_user_id')->references('id')->on('users');

            $table->string('expert_in');
            
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
        Schema::dropIfExists('reviewer_infos');
    }
};
