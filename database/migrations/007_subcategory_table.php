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
        Schema::dropIfExists('subcategory_table');
        Schema::create('subcategory_table', function (Blueprint $table) {
            $table->uuid('subcategory_id')->primary();
            $table->uuid('category_id');
            $table->string('subcategory_name');

            $table->foreign('category_id')->references('category_id')->on('category');
        });
    }
};
