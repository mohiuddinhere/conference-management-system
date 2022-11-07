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
        Schema::create('unique_identifiers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_uniqueIdentifier_id');
            $table->foreign('users_uniqueIdentifier_id')->references('id')->on('users');
            $table->unsignedBigInteger('author_orcidID');
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
        Schema::dropIfExists('unique_identifiers');
    }
};
