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
        Schema::create('static_pages', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('Тип страницы');
            $table->string('title')->comment('Заголовок');
            $table->string('description')->comment('Описание');
            $table->jsonb('attributes')->comment('Аттрибуты шаблона');
            $table->string('template')->comment('Наименование шаблона');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('static_pages');
    }
};
