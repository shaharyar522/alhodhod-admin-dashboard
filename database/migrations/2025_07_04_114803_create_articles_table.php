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
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // bigint unsigned auto_increment
            $table->string('lang', 40)->nullable(); // varchar(40), nullable
            $table->string('article_title', 255);   // varchar(255), not null
            $table->string('article_slug', 255)->unique(); // unique varchar(255)
            $table->string('article_image', 255)->nullable(); // varchar(255), nullable
            $table->text('content'); // text (64KB limit, same as your DB, not longText)
            $table->integer('show_on_home_page')->default(0); // int(11), default 0
            $table->unsignedBigInteger('menu_id')->nullable(); // bigint unsigned, nullable

            $table->timestamps(); // created_at, updated_at

            // foreign key

            $table->foreign('menu_id')->references('id')->on('menus')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }

};
