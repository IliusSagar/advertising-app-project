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
        Schema::create('post_ads', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('subcategory_id')->nullable();
            $table->string('divisions_id')->nullable();
            $table->string('district_id')->nullable();
            $table->string('area_id')->nullable();
            $table->string('condition_value')->nullable();
            $table->string('authenticity_value')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('model_id')->nullable();
            $table->text('edition')->nullable();
            $table->string('checkbox-1')->nullable();
            $table->string('checkbox-2')->nullable();
            $table->string('checkbox-3')->nullable();
            $table->string('checkbox-4')->nullable();
            $table->string('checkbox-5')->nullable();
            $table->string('checkbox-6')->nullable();
            $table->string('checkbox-7')->nullable();
            $table->string('checkbox-8')->nullable();
            $table->string('checkbox-9')->nullable();
            $table->string('checkbox-10')->nullable();
            $table->string('checkbox-11')->nullable();
            $table->string('checkbox-12')->nullable();
            $table->string('checkbox-13')->nullable();
            $table->string('checkbox-14')->nullable();
            $table->string('checkbox-15')->nullable();
            $table->string('checkbox-16')->nullable();
            $table->string('checkbox-17')->nullable();
            $table->string('checkbox-18')->nullable();
            $table->string('checkbox-19')->nullable();
            $table->string('checkbox-20')->nullable();
            $table->string('checkbox-21')->nullable();
            $table->string('checkbox-22')->nullable();
            $table->string('checkbox-23')->nullable();
            $table->string('checkbox-24')->nullable();
            $table->string('checkbox-25')->nullable();
            $table->string('checkbox-26')->nullable();
            $table->string('checkbox-27')->nullable();
            $table->string('checkbox-28')->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->text('img_one')->nullable();
            $table->text('img_two')->nullable();
            $table->text('img_three')->nullable();
            $table->text('img_four')->nullable();
            $table->text('img_five')->nullable();
            $table->text('img_six')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('membership_no')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_ads');
    }
};
