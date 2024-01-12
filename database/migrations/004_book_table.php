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
        Schema::dropIfExists('book');
        Schema::create('book', function (Blueprint $table) {
            $table->uuid('book_id')->primary();
            $table->uuid('company_id');
            $table->string('title');
            $table->unsignedBigInteger('ISBN')->length(13);
            $table->integer('page_number');
            $table->string('cover_type');
            $table->integer('inventory_quantity');
            $table->double('price');
            $table->string('description', 1000);
            $table->string('book_image_path');

            $table->foreign('company_id')->references('company_id')->on('publishing_company');
        });
    }
};
