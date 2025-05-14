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
        Schema::create('slides', function (Blueprint $table) {
            $table->id();

            $table->string('title')->comment('Заголовок');
            $table->text('description')->comment('Описание');
            $table->boolean('button_activity')->default(false)->comment('Флаг активности кнопки на слайде');
            $table->string('button_text')->nullable()->comment('Текст кнопки на слайде');
            $table->string('button_link')->nullable()->comment('Ссылка на страницу');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slides');
    }
};
