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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('favicon')->nullable();
            $table->longText('header_logo')->nullable();
            $table->longText('banner_one')->nullable();
            $table->longText('banner_two')->nullable();
            $table->longText('banner_three')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('hotline')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('android_app_link')->nullable();
            $table->longText('android_app_image')->nullable();
            $table->string('ios_app_link')->nullable();
            $table->longText('ios_app_image')->nullable();
            $table->longText('footer_logo')->nullable();
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
