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
        Schema::table('family_news', function (Blueprint $table) {

            $table->string('teaser')->nullable();
            $table->longText('gallery')->nullable();
            $table->string('gallery_title')->nullable();
            $table->longText('gallery_desc')->nullable();
            $table->longText('gallery_multiple')->nullable();

            $table->longText('video')->nullable();
            $table->string('video_title')->nullable();
            $table->longText('video_desc')->nullable();

            $table->longText('audio')->nullable();
            $table->string('audio_title')->nullable();
            $table->longText('audio_desc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('family_news', function (Blueprint $table) {

        });
    }
};
