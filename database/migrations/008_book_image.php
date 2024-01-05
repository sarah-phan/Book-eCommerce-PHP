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
        Schema::dropIfExists('book_image');
        Schema::create('book_image', function (Blueprint $table) {
            $table->uuid('book_image_id')->primary();
            $table->uuid('book_id');
            $table->string('book_image');

            $table->foreign('book_id')->references('book_id')->on('book');
        });
    }
};
