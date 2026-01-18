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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('blog'); // blog или news
            $table->string('title'); // Заголовок на английском
            $table->string('slug')->unique(); // ЧПУ URL: "how-to-shorten-links"
            $table->text('excerpt'); // Краткое превью для SEO
            $table->longText('content'); // Тело статьи

            // SEO Блок
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();

            $table->string('featured_image')->nullable(); // Картинка поста
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
