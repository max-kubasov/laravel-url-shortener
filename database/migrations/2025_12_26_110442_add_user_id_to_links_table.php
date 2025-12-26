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
        Schema::table('links', function (Blueprint $table) {
            // nullable() важен, чтобы старые ссылки не сломались, а гости могли создавать новые
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('links', function (Blueprint $table) {
            // 1. Сначала удаляем внешний ключ (связь)
            $table->dropForeign(['user_id']);

            // 2. Затем удаляем саму колонку
            $table->dropColumn('user_id');
        });
    }

};
