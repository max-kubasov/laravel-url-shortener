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
        Schema::create('landings', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // "link-shortener-for-instagram"

            // Контент (все на английском)
            $table->string('h1_title');
            $table->text('hero_subtitle');
            $table->longText('main_text'); // Основное SEO описание

            // SEO Блок
            $table->string('meta_title');
            $table->string('meta_description');

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landings');
    }
};
