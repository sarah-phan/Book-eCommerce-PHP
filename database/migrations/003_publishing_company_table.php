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
        Schema::dropIfExists('publishing_company');
        Schema::create('publishing_company', function (Blueprint $table) {
            $table->uuid('company_id')->primary();
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_phone');
        });
    }
};
