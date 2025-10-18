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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('banner')->nullable();
            $table->string('banner_alt')->nullable();
            $table->string('heading');
            $table->string('slug');
            $table->integer('category_id')->nullable();
            $table->string('read_time')->nullable();
            $table->longText('description');
            $table->longText('short_description')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->integer('author_id');
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
