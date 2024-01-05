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
        Schema::dropIfExists('author');
        Schema::create('author', function (Blueprint $table) {
            $table->uuid('author_id')->primary();
            $table->string('author_name');
        });
    }
};
