<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('review_and_rating');
        Schema::create('review_and_rating', function (Blueprint $table) {
            $table->uuid('review_and_rating_id')->primary();
            $table->uuid('user_id');
            $table->uuid('book_id');
            $table->string('content')->nullable();
            $table->integer('rating');
            $table->timestamps();

            $table->foreign('book_id')->references('book_id')->on('book');
            $table->foreign('user_id')->references('user_id')->on('user');
        });
    }
};
