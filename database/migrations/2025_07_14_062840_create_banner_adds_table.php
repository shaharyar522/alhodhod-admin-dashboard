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
        Schema::create('banner_adds', function (Blueprint $table) {
            $table->id();
            $table->string('ad_type')->nullable();      // Type of ad (e.g., banner, text, etc.)
            $table->string('add_url')->nullable();      // Image or media URL 
            $table->text('add_text')->nullable();
            $table->string('add_link')->nullable();
            $table->text('en')->nullable();
            $table->text('fr')->nullable();
            $table->text('ar')->nullable();
            $table->integer('add_clicks')->default(0);
            $table->boolean('add_status')->default(1);  //  1 par uay active hnga or 0 par uay in active hnga
            $table->string('in')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_adds');
    }
};
