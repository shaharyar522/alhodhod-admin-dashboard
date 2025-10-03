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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->text('icon')->nullable();
            $table->string('en_title', 255)->nullable();
            $table->string('en_value', 255)->nullable();
            $table->string('fr_title', 255)->nullable();
            $table->string('fr_value', 255)->nullable();
            $table->string('ar_title', 255)->nullable();
            $table->string('ar_value', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
