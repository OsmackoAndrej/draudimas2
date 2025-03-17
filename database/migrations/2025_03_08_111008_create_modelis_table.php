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
        Schema::create('modelis', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->foreignId('brand_id')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brand');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelis');
    }
};
