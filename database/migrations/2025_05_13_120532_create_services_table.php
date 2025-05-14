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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title')->comment('Заголовок');
            $table->text('description')->comment('Описание');
            $table->float('default_price', 8, 2)->nullable()->comment('Цена');
            $table->float('current_price', 8, 2)->nullable()->comment('Цена со скидкой');

            $table->string('seo_title')->comment('SEO Заголовок');
            $table->text('seo_description')->comment('SEO Описание');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
